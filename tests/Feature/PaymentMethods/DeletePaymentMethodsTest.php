<?php

namespace Tests\Feature\PaymentMethods;

use App\Models\PaymentMethod;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeletePaymentMethodsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_payment_methods()
    {
        $this->signIn('admin');

        $paymentMethod = new PaymentMethod;
        $paymentMethod->name = 'Test';
        $paymentMethod->save();

        $response = $this->makeRequest($paymentMethod->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('paymentmethods.index'));

        $paymentMethods = PaymentMethod::all();
      $this->assertEquals(0, $paymentMethods->count());
    }

     /** @test */
    public function public_user_cant_delete_payment_methods()
    {
    	$this->signIn('user');

        $paymentMethod = new PaymentMethod;
        $paymentMethod->name = 'Test';
        $paymentMethod->save();

        $response = $this->makeRequest($paymentMethod->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('paymentmethods.destroy', $id), $attributes);
    }
}