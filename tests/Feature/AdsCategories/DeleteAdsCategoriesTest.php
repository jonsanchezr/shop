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

class DeleteAdsCategoriesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_ads_categories()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 498, 204);

        $adsCategory = new AdsCategory;
        $adsCategory->title = 'Test';
        $adsCategory->url = 'test';
        $adsCategory->image = $file;
        $adsCategory->save();

        $response = $this->makeRequest($adsCategory->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('adscategories.index'));

        $adsCategories = AdsCategory::all();
      $this->assertEquals(0, $adsCategories->count());
    }

     /** @test */
    public function public_user_cant_delete_ads_categories()
    {
    	$this->signIn('user');
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

        $adsCategory = new AdsCategory;
        $adsCategory->title = 'Test';
        $adsCategory->url = 'test';
        $adsCategory->image = $file;
        $adsCategory->save();

        $response = $this->makeRequest($adsCategory->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('adscategories.destroy', $id), $attributes);
    }
}