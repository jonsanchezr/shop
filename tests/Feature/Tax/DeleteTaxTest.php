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

class DeleteTaxTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_tax()
    {
        $this->signIn('admin');

        $tax = new Tax;
        $tax->amount = 1;
        $tax->save();

        $response = $this->makeRequest($tax->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('tax.index'));

        $taxs = Tax::all();
      $this->assertEquals(0, $taxs->count());
    }

     /** @test */
    public function public_user_cant_delete_tax()
    {
    	$this->signIn('user');
        
        $tax = new Tax;
        $tax->amount = 1;
        $tax->save();

        $response = $this->makeRequest($tax->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('tax.destroy', $id), $attributes);
    }
}