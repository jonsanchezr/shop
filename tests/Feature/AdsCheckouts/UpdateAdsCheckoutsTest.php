<?php

namespace Tests\Feature\AdsCheckouts;

use App\Models\AdsCheckout;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateAdsCheckoutsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_ads_checkouts()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 400, 420);

        $adsCheckout = new AdsCheckout;
        $adsCheckout->title = 'Test';
        $adsCheckout->url = 'test';
        $adsCheckout->image = $file;
        $adsCheckout->save();

        $response = $this->makeRequest($adsCheckout->id, [
            'title' => 'TestActualizado',
            'url' => 'test',
            'image' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('adscheckouts.index'));

        $this->assertEquals('TestActualizado', $adsCheckout->fresh()->title);
    }

    /** @test */
    public function public_user_cant_update_ads_checkouts()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 400, 420);

        $adsCheckout = new AdsCheckout;
        $adsCheckout->title = 'Test';
        $adsCheckout->url = 'test';
        $adsCheckout->image = $file;
        $adsCheckout->save();

        $this->signIn('user');
        $response = $this->makeRequest($adsCheckout->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('adscheckouts.update', $id), $attributes);
    }
}
