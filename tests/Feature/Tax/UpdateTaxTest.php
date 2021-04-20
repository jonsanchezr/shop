<?php

namespace Tests\Feature\Tax;

use App\Models\Tax;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateTaxTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_tax()
    {
        $this->signIn('admin');

        $tax = new Tax;
        $tax->amount = 1;
        $tax->save();

        $response = $this->makeRequest($tax->id, [
            'amount' => 2,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('tax.index'));

        $this->assertEquals(2, $tax->fresh()->amount);
    }

    /** @test */
    public function public_user_cant_update_tax()
    {
        $tax = new Tax;
        $tax->amount = 1;
        $tax->save();

        $this->signIn('user');
        $response = $this->makeRequest($tax->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('tax.update', $id), $attributes);
    }
}
