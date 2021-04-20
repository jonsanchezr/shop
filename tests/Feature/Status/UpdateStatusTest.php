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

class UpdateStatusTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_status()
    {
        $this->signIn('admin');

        $statu = new Statu;
        $statu->name = 'Test';
        $statu->save();

        $response = $this->makeRequest($statu->id, [
            'name' => 'TestActualizado',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('status.index'));

        $this->assertEquals('TestActualizado', $statu->fresh()->name);
    }

    /** @test */
    public function public_user_cant_update_ads_categories()
    {
        $statu = new Statu;
        $statu->name = 'Test';
        $statu->save();

        $this->signIn('user');
        $response = $this->makeRequest($statu->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('status.update', $id), $attributes);
    }
}
