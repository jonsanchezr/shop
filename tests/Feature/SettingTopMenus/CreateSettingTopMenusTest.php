<?php

namespace Tests\Feature\SettingTopMenus;

use App\Models\SettingTopmenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateSettingTopMenusTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_setting_top_menus()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('settingtopmenus.index'));
      
      $settingTopmenus = SettingTopmenu::all();
      $this->assertEquals(1, $settingTopmenus->count());
    }

    /** @test */
    public function public_user_cant_create_setting_top_menus()
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
        'title' => 'Test',
        'url' => 'test',
      ];
      
      return $this->post(route('settingtopmenus.store'), array_merge($nowData, $attributes));
    }
    
}