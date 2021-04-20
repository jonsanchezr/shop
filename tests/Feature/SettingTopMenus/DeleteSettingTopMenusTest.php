<?php

namespace Tests\Feature\SettingTopMenus;

use App\Models\SettingTopmenu;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteSettingTopMenusTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_setting_top_menus()
    {
        $this->signIn('admin');

        $settingTopmenu = new SettingTopmenu;
        $settingTopmenu->title = 'Test';
        $settingTopmenu->url = 'test';
        $settingTopmenu->save();

        $response = $this->makeRequest($settingTopmenu->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('settingtopmenus.index'));

        $settingTopmenus = SettingTopmenu::all();
      $this->assertEquals(0, $settingTopmenus->count());
    }

     /** @test */
    public function public_user_cant_delete_setting_top_menus()
    {
    	$this->signIn('user');
        
        $settingTopmenu = new SettingTopmenu;
        $settingTopmenu->title = 'Test';
        $settingTopmenu->url = 'test';
        $settingTopmenu->save();

        $response = $this->makeRequest($settingTopmenu->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('settingtopmenus.destroy', $id), $attributes);
    }
}