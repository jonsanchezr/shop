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

class UpdateProductsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_products()
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

        $response = $this->makeRequest($product->slug, [
            'category_id' => 1,
            'brand_id' => 2,
            'title' => 'TestActualizado',
            'short_description' => 'Test Short Description',
            'large_description' => 'Test Large Description',
            'amount' => 25.55,
            'unit' => 6,
            'slug' => 'test',
            'slot_image_1' => $image1,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));

        $this->assertEquals('TestActualizado', $product->fresh()->title);
    }

    /** @test */
    public function public_user_cant_update_products()
    {
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

        $this->signIn('user');
        $response = $this->makeRequest($product->slug);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($slug, $attributes = []): TestResponse
    {
        return $this->put(route('products.update', $slug), $attributes);
    }
}
