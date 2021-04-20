<?php

namespace Tests\Feature\AdsCategories;

use App\Models\AdsIndex;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateAdsIndexTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_ads_index()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 1533, 600);

        $adsIndex = new AdsIndex;
        $adsIndex->title = 'Test';
        $adsIndex->url = 'test';
        $adsIndex->image = $file;
        $adsIndex->save();

        $response = $this->makeRequest($adsIndex->id, [
            'title' => 'TestActualizado',
            'url' => 'test',
            'image' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('adsindex.index'));

        $this->assertEquals('TestActualizado', $adsIndex->fresh()->title);
    }

    /** @test */
    public function public_user_cant_update_ads_index()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 1533, 600);

        $adsIndex = new AdsIndex;
        $adsIndex->title = 'Test';
        $adsIndex->url = 'test';
        $adsIndex->image = $file;
        $adsIndex->save();

        $this->signIn('user');
        $response = $this->makeRequest($adsIndex->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('adsindex.update', $id), $attributes);
    }
}
