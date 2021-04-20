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

class DeleteAdsCheckoutsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_ads_checkouts()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 400, 420);

        $adsCheckout = new AdsCheckout;
        $adsCheckout->title = 'Test';
        $adsCheckout->url = 'test';
        $adsCheckout->image = $file;
        $adsCheckout->save();

        $response = $this->makeRequest($adsCheckout->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('adscheckouts.index'));

        $adsCheckouts = AdsCheckout::all();
      $this->assertEquals(0, $adsCheckouts->count());
    }

     /** @test */
    public function public_user_cant_delete_ads_checkouts()
    {
    	$this->signIn('user');
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 400, 420);

        $adsCheckout = new AdsCheckout;
        $adsCheckout->title = 'Test';
        $adsCheckout->url = 'test';
        $adsCheckout->image = $file;
        $adsCheckout->save();

        $response = $this->makeRequest($adsCheckout->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('adscheckouts.destroy', $id), $attributes);
    }
}