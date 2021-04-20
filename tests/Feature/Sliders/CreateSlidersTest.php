<?php

namespace Tests\Feature\Sliders;

use App\Models\Slider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateSlidersTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_sliders()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('sliders.index'));
      
      $sliders = Slider::all();
      $this->assertEquals(1, $sliders->count());
    }

    /** @test */
    public function public_user_cant_create_sliders()
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
      $file = UploadedFile::fake()->image('avatar.jpg', 675, 432);

      $nowData = [
        'brand_id' => 1,
        'title' => 'Test',
        'amount' => 123.45,
        'url' => '/Test',
        'image' => $file,
      ];
      
      return $this->post(route('sliders.store'), array_merge($nowData, $attributes));
    }
    
}