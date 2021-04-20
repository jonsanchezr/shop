<?php

namespace Tests\Feature\OfferLimits;

use App\Models\OfferLimit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateOfferLimitsTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_offer_limits()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('offerlimits.index'));
      
      $offerLimits = OfferLimit::all();
      $this->assertEquals(1, $offerLimits->count());
    }

    /** @test */
    public function public_user_cant_create_offer_limits()
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
      $file = UploadedFile::fake()->image('avatar.jpg', 519, 477);

      $nowData = [
        'title' => 'Test',
        'subtitle' => 'SubTest',
        'description' => 'DescriptionTest',
        'url' => '/Test',
        'image' => $file,
      ];
      
      return $this->post(route('offerlimits.store'), array_merge($nowData, $attributes));
    }
    
}