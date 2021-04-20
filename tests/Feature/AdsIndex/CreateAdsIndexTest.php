<?php

namespace Tests\Feature\AdsIndex;

use App\Models\AdsIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateAdsIndexTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_ads_index()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('adsindex.index'));
      
      $adsIndex = AdsIndex::all();
      $this->assertEquals(1, $adsIndex->count());
    }

    /** @test */
    public function public_user_cant_create_ads_index()
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
      $file = UploadedFile::fake()->image('avatar.jpg', 1533, 600);

      $nowData = [
        'title' => 'Test',
        'url' => '/Test',
        'image' => $file,
      ];
      
      return $this->post(route('adsindex.store'), array_merge($nowData, $attributes));
    }
    
}