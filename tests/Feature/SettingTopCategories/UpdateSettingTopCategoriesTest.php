<?php

namespace Tests\Feature\SettingTopCategories;

use App\Models\SettingTopcategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateSettingTopCategoriesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_setting_top_categories()
    {
        $this->signIn('admin');

        $settingTopcategory = new SettingTopcategory;
        $settingTopcategory->category_id = 1;
        $settingTopcategory->save();

        $response = $this->makeRequest($settingTopcategory->id, [
            'category_id' => 2,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('settingtopcategories.index'));

        $this->assertEquals(2, $settingTopcategory->fresh()->category_id);
    }

    /** @test */
    public function public_user_cant_update_setting_top_categories()
    {
        $settingTopcategory = new SettingTopcategory;
        $settingTopcategory->category_id = 1;
        $settingTopcategory->save();

        $this->signIn('user');
        $response = $this->makeRequest($settingTopcategory->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('settingtopcategories.update', $id), $attributes);
    }
}
