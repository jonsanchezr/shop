<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class BrandTest extends TestCase
{
    private Brand $brand;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->brand = new Brand();
        $this->brand->name = 'Samsung';
        $this->brand->slug = 'Samsung';
        $this->brand->logo = 'samsung.jpg';
    }

    /** @test */
    public function brand_has_many_products()
    {
        $this->assertInstanceOf(HasMany::class, $this->brand->products());
        $this->assertInstanceOf(Product::class, $this->brand->products()->getModel());
    }

    /** @test */
    public function brand_has_many_sliders()
    {
        $this->assertInstanceOf(HasMany::class, $this->brand->sliders());
        $this->assertInstanceOf(Slider::class, $this->brand->sliders()->getModel());
    }
}
