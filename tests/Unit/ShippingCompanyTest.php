<?php

namespace Tests\Unit;

use App\Models\ShippingCompany;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class ShippingCompanyTest extends TestCase
{
    private ShippingCompany $shippingCompany;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->shippingCompany = new ShippingCompany();
        $this->shippingCompany->name = 'Test';
        $this->shippingCompany->description = 'test';
        $this->shippingCompany->delivery_time = '0days';
        $this->shippingCompany->price = 1;
    }

    /** @test */
    public function shipping_company_has_many_orders()
    {
        $this->assertInstanceOf(HasMany::class, $this->shippingCompany->orders());
        $this->assertInstanceOf(Order::class, $this->shippingCompany->orders()->getModel());
    }
}
