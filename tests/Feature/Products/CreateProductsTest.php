<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateProductsTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_products()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('products.index'));
      
      $products = Product::all();
      $this->assertEquals(1, $products->count());
    }

    /** @test */
    public function public_user_cant_create_products()
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
      $image1 = UploadedFile::fake()->image('avatar1.jpg', 260, 176);

      $nowData = [
        'category_id' => 2,
        'brand_id' => 1,
        'title' => 'Test',
        'short_description' => 'Test Short Description',
        'large_description' => 'Test Large Description',
        'amount' => 25.55,
        'unit' => 6,
        'slug' => 'test',
        'slot_image_1' => $image1,
      ];
      
      return $this->post(route('products.store'), array_merge($nowData, $attributes));
    }
    
}