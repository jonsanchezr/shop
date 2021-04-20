<?php

namespace Tests\Unit;

use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    private PaymentMethod $paymentMethod;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->paymentMethod = new PaymentMethod();
        $this->paymentMethod->name = 'Test';
    }

     /** @test */
    public function payment_method_has_many_orders()
    {
        $this->assertInstanceOf(HasMany::class, $this->paymentMethod->orders());
        $this->assertInstanceOf(Order::class, $this->paymentMethod->orders()->getModel());
    }

    /** @test */
    public function payment_methods_belongs_to_product()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->paymentMethod->product());
        $this->assertInstanceOf(Product::class, $this->paymentMethod->product()->getModel());
    }
}
