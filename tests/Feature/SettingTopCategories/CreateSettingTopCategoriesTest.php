<?php

namespace Tests\Feature\SettingTopCategories;

use App\Models\SettingTopcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateSettingTopCategoriesTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_setting_top_categories()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('settingtopcategories.index'));
      
      $settingTopcategory = SettingTopcategory::all();
      $this->assertEquals(1, $settingTopcategory->count());
    }

    /** @test */
    public function public_user_cant_create_setting_top_categories()
    {
        $this->signIn('user');
        $response = $this->makeRequest();
        $response->assertStatus(401);
    }

    /**
     * @return TestResponse
     */
    private function makeRequest($attributes = []): TestResponse
    {
      $nowData = [
        'category_id' => 1,
      ];
      
      return $this->post(route('settingtopcategories.store'), array_merge($nowData, $attributes));
    }
    
}