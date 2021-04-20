<?php

namespace Tests\Feature\Sliders;

use App\Models\Slider;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteSlidersTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_sliders()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 675, 432);

        $slider = new Slider;
        $slider->brand_id = 1;
        $slider->title = 'Test';
        $slider->amount = 123.45;
        $slider->url = 'test';
        $slider->image = $file;
        $slider->save();

        $response = $this->makeRequest($slider->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('sliders.index'));

        $sliders = Slider::all();
      $this->assertEquals(0, $sliders->count());
    }

     /** @test */
    public function public_user_cant_delete_sliders()
    {
    	$this->signIn('user');
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg', 675, 432);

        $slider = new Slider;
        $slider->brand_id = 1;
        $slider->title = 'Test';
        $slider->amount = 123.45;
        $slider->url = 'test';
        $slider->image = $file;
        $slider->save();

        $response = $this->makeRequest($slider->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('sliders.destroy', $id), $attributes);
    }
}