<?php

namespace Tests\Feature\ShippingCompanies;

use App\Models\ShippingCompany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateShippingCompaniesTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_shipping_companies()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('shippingcompanies.index'));
      
      $shippingCompanies = ShippingCompany::all();
      $this->assertEquals(1, $shippingCompanies->count());
    }

    /** @test */
    public function public_user_cant_create_shipping_companies()
    {
        $this->signIn('user');
        $response = $this->makeRequest();
        $response->assertStatus(401);
    }

    /**
     * @return TestResponse
     */
    private function makeRequest($attributes = []): TestResponse
    {
      $nowData = [
        'name' => 'Test',
        'description' => 'test',
        'delivery_time' => '0 days',
        'price' => 1,
      ];
      
      return $this->post(route('shippingcompanies.store'), array_merge($nowData, $attributes));
    }
    
}