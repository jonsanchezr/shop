<?php

namespace Tests;

use App\User;
use App\Role;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Closure;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\SQLiteBuilder;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->hotFixSqlite(); // TODO: Temporary solution, remove it when you can
    }

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake();
//        Mail::fake();
        Notification::fake();
//        Excel::fake();
//        Queue::fake();
//        Schema::enableForeignKeyConstraints();
    }

    /**
     * Helper for signing in a user. If no user is provided it will log in an Admin user.
     *
     * @param null $user
     * @param string|null $guard
     * @return User
     */
    protected function signIn(string $nameRole = 'user') : User
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.admin';
        $user->password = Hash::make('123456789');
        $user->save();
        $user->roles()->attach(Role::where('name', $nameRole)->first());
        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'admin',
            'last_name' => 'admin',
            'identity' => '23456789',
            'avatar' => 'avatar-default.jpg',
        ]);

        $this->actingAs($user, null);

        return $user;
    }

    /**
     * @param Model $model
     * @param string $traitClass
     */
    protected function assertUsesTrait(Model $model, string $traitClass)
    {
        $this->assertTrue(in_array($traitClass, class_uses($model)));
    }

    /**
     * @param $value
     * @param array $array
     * @return bool
     */
    protected function assertInArray($value, array $array): bool
    {
        return in_array($value, $array);
    }

    /**
     * @param $value
     * @param array $array
     * @return bool
     */
    protected function assertNotInArray($value, array $array): bool
    {
        return ! $this->assertInArray($value, $array);
    }

    /**
     * @param Model $model
     * @param string $casterClass
     * @param string $attribute
     */
    protected function assertHasCaster(Model $model, string $casterClass, string $attribute)
    {
        $this->assertEquals($casterClass, $model->getCasts()[$attribute]);
    }

    /**
     * Hot fix for dropping foreign in sqlite database
     * https://github.com/laravel/framework/issues/25475
     */
    public static function hotFixSqlite()
    {
        Connection::resolverFor('sqlite', function ($connection, $database, $prefix, $config) {
            return new class($connection, $database, $prefix, $config) extends SQLiteConnection {
                public function getSchemaBuilder(): SQLiteBuilder
                {
                    if ($this->schemaGrammar === null) {
                        $this->useDefaultSchemaGrammar();
                    }
                    return new class($this) extends SQLiteBuilder {
                        protected function createBlueprint($table, Closure $callback = null): Blueprint
                        {
                            return new class($table, $callback) extends Blueprint {
                                public function dropForeign($index): Fluent
                                {
                                    return new Fluent();
                                }
                            };
                        }
                    };
                }
            };
        });
    }
}
