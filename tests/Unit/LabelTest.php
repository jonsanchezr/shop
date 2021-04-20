<?php

namespace Tests\Unit;

use App\Models\Label;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class LabelTest extends TestCase
{
    private Label $label;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->label = new Label();
        $this->label->name = 'Test';
        $this->label->slug = 'test';
    }

    /** @test */
    public function labels_belongs_to_product()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->label->product());
        $this->assertInstanceOf(Product::class, $this->label->product()->getModel());
    }
}
