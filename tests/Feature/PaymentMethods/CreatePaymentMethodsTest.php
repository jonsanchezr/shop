<?php

namespace Tests\Feature\PaymentMethods;

use App\Models\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreatePaymentMethodsTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_payment_methods()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('paymentmethods.index'));
      
      $paymentMethods = PaymentMethod::all();
      $this->assertEquals(1, $paymentMethods->count());
    }

    /** @test */
    public function public_user_cant_create_payment_methods()
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
      ];
      
      return $this->post(route('paymentmethods.store'), array_merge($nowData, $attributes));
    }
    
}