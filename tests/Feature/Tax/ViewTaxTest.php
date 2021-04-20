<?php

namespace Tests\Feature\Tax;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;

class ViewTaxTest extends TestCase
{
	use RefreshDatabase, WithoutEvents;

	protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_fetch_all_tax()
    {
        $this->signIn('admin');

        $response = $this->makeRequest();
        $response->assertStatus(200);
    }

    /** @test */
    public function public_user_cant_fetch_all_tax()
    {
        $this->signIn('user');

        $response = $this->makeRequest();
        $response->assertStatus(401);
    }

    /** @test */
    public function not_login_user_cant_fetch_all_tax()
    {
        $response = $this->makeRequest();
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    /**
     * @return TestResponse
     */
    private function makeRequest(): TestResponse
    {
    	return $this->get(route('tax.index'));
    }
}