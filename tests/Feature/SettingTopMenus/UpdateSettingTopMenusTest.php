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

class UpdateSettingTopMenusTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_setting_top_menus()
    {
        $this->signIn('admin');

        $settingTopmenu = new SettingTopmenu;
        $settingTopmenu->title = 'Test';
        $settingTopmenu->url = 'test';
        $settingTopmenu->save();

        $response = $this->makeRequest($settingTopmenu->id, [
            'title' => 'TestActualizado',
            'url' => 'test',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('settingtopmenus.index'));

        $this->assertEquals('TestActualizado', $settingTopmenu->fresh()->title);
    }

    /** @test */
    public function public_user_cant_update_setting_top_menus()
    {
        $settingTopmenu = new SettingTopmenu;
        $settingTopmenu->title = 'Test';
        $settingTopmenu->url = 'test';
        $settingTopmenu->save();

        $this->signIn('user');
        $response = $this->makeRequest($settingTopmenu->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('settingtopmenus.update', $id), $attributes);
    }
}
