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

class UpdatePaymentMethodsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_payment_methods()
    {
        $this->signIn('admin');

        $paymentMethod = new PaymentMethod;
        $paymentMethod->name = 'Test';
        $paymentMethod->save();

        $response = $this->makeRequest($paymentMethod->id, [
            'name' => 'TestActualizado',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('paymentmethods.index'));

        $this->assertEquals('TestActualizado', $paymentMethod->fresh()->name);
    }

    /** @test */
    public function public_user_cant_update_payment_methods()
    {
        $paymentMethod = new PaymentMethod;
        $paymentMethod->name = 'Test';
        $paymentMethod->save();

        $this->signIn('user');
        $response = $this->makeRequest($paymentMethod->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('paymentmethods.update', $id), $attributes);
    }
}
