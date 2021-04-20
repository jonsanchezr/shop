<?php

namespace Tests\Feature\SocialNetworks;

use App\Models\SocialNetwork;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateSocialNetworkTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_social_networks()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('socialnetworks.index'));
      
      $socialNetworks = SocialNetwork::all();
      $this->assertEquals(1, $socialNetworks->count());
    }

    /** @test */
    public function public_user_cant_create_social_networks()
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
        'profile_company_id' => 1,
        'name' => 'Test',
        'url' => 'test',
      ];
      
      return $this->post(route('socialnetworks.store'), array_merge($nowData, $attributes));
    }
    
}