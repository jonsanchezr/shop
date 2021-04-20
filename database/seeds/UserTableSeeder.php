<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@user.user';
        $user->password = Hash::make('123456789');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'user',
            'last_name' => 'user',
            'identity' => '12345678',
            'avatar' => 'avatar-default.jpg',
        ]);
        
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.admin';
        $user->password = Hash::make('123456789');
        $user->save();
        $user->roles()->attach(Role::where('name', 'admin')->first());
        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'admin',
            'last_name' => 'admin',
            'identity' => '23456789',
            'avatar' => 'avatar-default.jpg',
        ]);
    }
}
