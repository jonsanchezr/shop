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

class UpdateOfferLimitsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_offer_limits()
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

        $response = $this->makeRequest($offerLimit->id, [
            'title' => 'TestActualizado',
            'subtitle' => 'SubTest',
            'description' => 'DescriptionTest',
            'url' => '/Test',
            'image' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('offerlimits.index'));

        $this->assertEquals('TestActualizado', $offerLimit->fresh()->title);
    }

    /** @test */
    public function public_user_cant_update_offer_limits()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 519, 477);

        $offerLimit = new OfferLimit;
        $offerLimit->title = 'Test';
        $offerLimit->subtitle = 'SubTest';
        $offerLimit->description = 'DescriptionTest';
        $offerLimit->url = 'test';
        $offerLimit->image = $file;
        $offerLimit->save();

        $this->signIn('user');
        $response = $this->makeRequest($offerLimit->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('offerlimits.update', $id), $attributes);
    }
}
