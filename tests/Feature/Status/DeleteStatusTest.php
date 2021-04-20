<?php

namespace Tests\Feature\Status;

use App\Models\Statu;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteStatusTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_status()
    {
        $this->signIn('admin');

        $statu = new Statu;
        $statu->name = 'Test';
        $statu->save();

        $response = $this->makeRequest($statu->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('status.index'));

        $status = Statu::all();
      $this->assertEquals(0, $status->count());
    }

     /** @test */
    public function public_user_cant_delete_status()
    {
    	$this->signIn('user');
        
        $statu = new Statu;
        $statu->name = 'Test';
        $statu->save();

        $response = $this->makeRequest($statu->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('status.destroy', $id), $attributes);
    }
}