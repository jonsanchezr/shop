<?php

namespace Tests\Feature\ShippingCompanies;

use App\Models\ShippingCompany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateShippingCompaniesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_shipping_companies()
    {
        $this->signIn('admin');

        $shippingCompany = new ShippingCompany;
        $shippingCompany->name = 'Test';
        $shippingCompany->description = 'test';
        $shippingCompany->delivery_time = '0 days';
        $shippingCompany->price = 1;
        $shippingCompany->save();

        $response = $this->makeRequest($shippingCompany->id, [
            'name' => 'TestActualizado',
            'description' => 'test',
            'delivery_time' => '0 days',
            'price' => 1,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('shippingcompanies.index'));

        $this->assertEquals('TestActualizado', $shippingCompany->fresh()->name);
    }

    /** @test */
    public function public_user_cant_update_shipping_companies()
    {
        $shippingCompany = new ShippingCompany;
        $shippingCompany->name = 'Test';
        $shippingCompany->description = 'test';
        $shippingCompany->delivery_time = '0 days';
        $shippingCompany->price = 1;
        $shippingCompany->save();

        $this->signIn('user');
        $response = $this->makeRequest($shippingCompany->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('shippingcompanies.update', $id), $attributes);
    }
}
