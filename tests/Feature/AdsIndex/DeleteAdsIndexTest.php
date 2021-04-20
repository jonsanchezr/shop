<?php

namespace Tests\Feature\AdsIndex;

use App\Models\AdsIndex;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteAdsIndexTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_ads_index()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 1533, 600);

        $adsIndex = new AdsIndex;
        $adsIndex->title = 'Test';
        $adsIndex->url = 'test';
        $adsIndex->image = $file;
        $adsIndex->save();

        $response = $this->makeRequest($adsIndex->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('adsindex.index'));

        $adsIndexs = AdsIndex::all();
      $this->assertEquals(0, $adsIndexs->count());
    }

     /** @test */
    public function public_user_cant_delete_ads_index()
    {
    	$this->signIn('user');
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 1533, 600);

        $adsIndex = new AdsIndex;
        $adsIndex->title = 'Test';
        $adsIndex->url = 'test';
        $adsIndex->image = $file;
        $adsIndex->save();

        $response = $this->makeRequest($adsIndex->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('adsindex.destroy', $id), $attributes);
    }
}