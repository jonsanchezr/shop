<?php

namespace Tests\Feature\AdsCategories;

use App\Models\AdsCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateAdsCategoriesTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_ads_categories()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('adscategories.index'));
      
      $adsCategories = AdsCategory::all();
      $this->assertEquals(1, $adsCategories->count());
    }

    /** @test */
    public function public_user_cant_create_ads_categories()
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
      Storage::fake('avatars');
      $file = UploadedFile::fake()->image('avatar.jpg', 498, 204);

      $nowData = [
        'title' => 'Test',
        'url' => '/Test',
        'image' => $file,
      ];
      
      return $this->post(route('adscategories.store'), array_merge($nowData, $attributes));
    }
    
}