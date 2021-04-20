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

class DeleteSettingTopCategoriesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_setting_top_categories()
    {
        $this->signIn('admin');

        $settingTopcategory = new SettingTopcategory;
        $settingTopcategory->category_id = 1;
        $settingTopcategory->save();

        $response = $this->makeRequest($settingTopcategory->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('settingtopcategories.index'));

        $settingTopcategories = SettingTopcategory::all();
      $this->assertEquals(0, $settingTopcategories->count());
    }

     /** @test */
    public function public_user_cant_delete_setting_top_categories()
    {
    	$this->signIn('user');
        
        $settingTopcategory = new SettingTopcategory;
        $settingTopcategory->category_id = 1;
        $settingTopcategory->save();

        $response = $this->makeRequest($settingTopcategory->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('settingtopcategories.destroy', $id), $attributes);
    }
}