<?php

namespace Tests\Feature\OfferLimits;

use App\Models\OfferLimit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteOfferLimitsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_offer_limits()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 519, 477);

        $offerLimit = new OfferLimit;
        $offerLimit->title = 'Test';
        $offerLimit->subtitle = 'SubTest';
        $offerLimit->description = 'DescriptionTest';
        $offerLimit->url = 'test';
        $offerLimit->image = $file;
        $offerLimit->save();

        $response = $this->makeRequest($offerLimit->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('offerlimits.index'));

        $offerLimits = OfferLimit::all();
      $this->assertEquals(0, $offerLimits->count());
    }

     /** @test */
    public function public_user_cant_delete_offer_limits()
    {
    	$this->signIn('user');
        
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 519, 477);

        $offerLimit = new OfferLimit;
        $offerLimit->title = 'Test';
        $offerLimit->subtitle = 'SubTest';
        $offerLimit->description = 'DescriptionTest';
        $offerLimit->url = 'test';
        $offerLimit->image = $file;
        $offerLimit->save();

        $response = $this->makeRequest($offerLimit->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('offerlimits.destroy', $id), $attributes);
    }
}