<?php

namespace Tests\Feature\AdsCategories;

use App\Models\AdsCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateAdsCategoriesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_ads_categories()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 498, 204);

        $adsCategory = new AdsCategory;
        $adsCategory->title = 'Test';
        $adsCategory->url = 'test';
        $adsCategory->image = $file;
        $adsCategory->save();

        $response = $this->makeRequest($adsCategory->id, [
            'title' => 'TestActualizado',
            'url' => 'test',
            'image' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('adscategories.index'));

        $this->assertEquals('TestActualizado', $adsCategory->fresh()->title);
    }

    /** @test */
    public function public_user_cant_update_ads_categories()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

        $adsCategory = new AdsCategory;
        $adsCategory->title = 'Test';
        $adsCategory->url = 'test';
        $adsCategory->image = $file;
        $adsCategory->save();

        $this->signIn('user');
        $response = $this->makeRequest($adsCategory->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('adscategories.update', $id), $attributes);
    }
}
