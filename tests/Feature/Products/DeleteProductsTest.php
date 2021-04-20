<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteProductsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_ads_products()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $image1 = UploadedFile::fake()->image('avatar1.jpg', 260, 176);

        $product = new Product;
        $product->category_id = 1;
        $product->brand_id = 2;
        $product->title = 'Test';
        $product->short_description = 'short_description';
        $product->large_description = 'large_description';
        $product->amount = 25.55;
        $product->unit = 4;
        $product->slug = 'test';
        $product->slot_image_1 = $image1;
        $product->save();

        $response = $this->makeRequest($product->slug);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));

        $products = Product::all();
      $this->assertEquals(0, $products->count());
    }

     /** @test */
    public function public_user_cant_delete_products()
    {
    	$this->signIn('user');

        Storage::fake('avatars');
        $image1 = UploadedFile::fake()->image('avatar1.jpg', 260, 176);

        $product = new Product;
        $product->category_id = 1;
        $product->brand_id = 2;
        $product->title = 'Test';
        $product->short_description = 'short_description';
        $product->large_description = 'large_description';
        $product->amount = 25.55;
        $product->unit = 4;
        $product->slug = 'test';
        $product->slot_image_1 = $image1;
        $product->save();

        $response = $this->makeRequest($product->slug);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($slug, $attributes = []): TestResponse
    {
        return $this->delete(route('products.destroy', $slug), $attributes);
    }
}