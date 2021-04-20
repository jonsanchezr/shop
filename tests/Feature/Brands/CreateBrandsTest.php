<?php

namespace Tests\Feature\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateBrandsTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_brands()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('brands.index'));
      
      $brands = Brand::all();
      $this->assertEquals(1, $brands->count());
    }

    /** @test */
    public function public_user_cant_create_brands()
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
      $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

      $nowData = [
        'name' => 'Test',
        'slug' => 'Test',
        'logo' => $file,
      ];
      
      return $this->post(route('brands.store'), array_merge($nowData, $attributes));
    }
    
}