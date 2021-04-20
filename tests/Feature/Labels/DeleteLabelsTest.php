<?php

namespace Tests\Feature\Labels;

use App\Models\Label;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteLabelsTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_labels()
    {
        $this->signIn('admin');

        $label = new Label;
        $label->name = 'Test';
        $label->slug = 'test';
        $label->save();

        $response = $this->makeRequest($label->slug);

        $response->assertStatus(302);
        $response->assertRedirect(route('labels.index'));

        $labels = Label::all();
      $this->assertEquals(0, $labels->count());
    }

     /** @test */
    public function public_user_cant_delete_labels()
    {
    	$this->signIn('user');
        
        $label = new Label;
        $label->name = 'Test';
        $label->slug = 'test';
        $label->save();

        $response = $this->makeRequest($label->slug);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($slug, $attributes = []): TestResponse
    {
        return $this->delete(route('labels.destroy', $slug), $attributes);
    }
}