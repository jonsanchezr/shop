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

class DeleteBrandsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_brands()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

        $brand = new Brand;
        $brand->name = 'Test';
        $brand->slug = 'test';
        $brand->logo = $file;
        $brand->save();

        $response = $this->makeRequest($brand->slug);

        $response->assertStatus(302);
        $response->assertRedirect(route('brands.index'));

        $brands = Brand::all();
      $this->assertEquals(0, $brands->count());
    }

     /** @test */
    public function public_user_cant_delete_brands()
    {
    	$this->signIn('user');
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 330, 88);

        $brand = new Brand;
        $brand->name = 'Test';
        $brand->slug = 'test';
        $brand->logo = $file;
        $brand->save();

        $response = $this->makeRequest($brand->slug);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($slug, $attributes = []): TestResponse
    {
        return $this->delete(route('brands.destroy', $slug), $attributes);
    }
}