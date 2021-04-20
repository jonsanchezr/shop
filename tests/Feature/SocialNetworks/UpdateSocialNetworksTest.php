<?php

namespace Tests\Feature\SocialNetworks;

use App\Models\SocialNetwork;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateSocialNetworksTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_social_networks()
    {
        $this->signIn('admin');

        $socialNetwork = new SocialNetwork;
        $socialNetwork->profile_company_id = 1;
        $socialNetwork->name = 'Test';
        $socialNetwork->url = 'test';
        $socialNetwork->save();

        $response = $this->makeRequest($socialNetwork->id, [
            'profile_company_id' => 1,
            'name' => 'TestActualizado',
            'url' => 'test',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('socialnetworks.index'));

        $this->assertEquals('TestActualizado', $socialNetwork->fresh()->name);
    }

    /** @test */
    public function public_user_cant_update_social_networks()
    {
        $socialNetwork = new SocialNetwork;
        $socialNetwork->profile_company_id = 1;
        $socialNetwork->name = 'Test';
        $socialNetwork->url = 'test';
        $socialNetwork->save();

        $this->signIn('user');
        $response = $this->makeRequest($socialNetwork->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('socialnetworks.update', $id), $attributes);
    }
}
