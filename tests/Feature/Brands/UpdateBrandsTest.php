<?php

namespace Tests\Feature\Brandss;

use App\Models\Brand;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateBrandsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_brands()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

        $brand = new Brand;
        $brand->name = 'Test';
        $brand->slug = 'test';
        $brand->logo = $file;
        $brand->save();

        $response = $this->makeRequest($brand->slug, [
            'name' => 'TestActualizado',
            'slug' => 'test',
            'logo' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('brands.index'));

        $this->assertEquals('TestActualizado', $brand->fresh()->name);
    }

    /** @test */
    public function public_user_cant_update_brands()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

        $brand = new Brand;
        $brand->name = 'Test';
        $brand->slug = 'test';
        $brand->logo = $file;
        $brand->save();

        $this->signIn('user');
        $response = $this->makeRequest($brand->slug);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($slug, $attributes = []): TestResponse
    {
        return $this->put(route('brands.update', $slug), $attributes);
    }
}
