<?php

namespace Tests\Unit;

use App\Models\Statu;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class StatuTest extends TestCase
{
    private Statu $statu;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->statu = new Statu();
        $this->statu->name = 'Test';
    }

    /** @test */
    public function statu_has_many_orders()
    {
        $this->assertInstanceOf(HasMany::class, $this->statu->orders());
        $this->assertInstanceOf(Order::class, $this->statu->orders()->getModel());
    }
}
