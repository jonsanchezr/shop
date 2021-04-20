<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class SliderTest extends TestCase
{
    private Slider $slider;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->slider = new Slider();
        $this->slider->brand_id = 1;
        $this->slider->title = 'Test';
        $this->slider->amount = 123.45;
        $this->slider->url = 'test';
        $this->slider->image = 'samsung.jpg';
    }

    /** @test */
    public function slider_belongs_to_brand()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->slider->brand());
        $this->assertInstanceOf(Brand::class, $this->slider->brand()->getModel());
    }
}
