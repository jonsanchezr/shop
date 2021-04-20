<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class ProductTest extends TestCase
{
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->product = new Product();
        $this->product->category_id = 1;
        $this->product->brand_id = 2;
        $this->product->title = 'Test';
        $this->product->short_description = 'short_description';
        $this->product->large_description = 'large_description';
        $this->product->amount = 25.55;
        $this->product->unit = 4;
        $this->product->slug = 'test';
        $this->product->slot_image_1 = 'image1.png';
    }

    /** @test */
    public function products_belongs_to_brand()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->product->brand());
        $this->assertInstanceOf(Brand::class, $this->product->brand()->getModel());
    }

    /** @test */
    public function products_belongs_to_category()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->product->category());
        $this->assertInstanceOf(Category::class, $this->product->category()->getModel());
    }

    /** @test */
    public function products_belongs_to_orders()
    {
        $this->assertInstanceOf(BelongsToMany::class, $this->product->orders());
        $this->assertInstanceOf(Order::class, $this->product->orders()->getModel());
    }
}
