<?php

namespace Tests\Feature\ProfileCompanies;

use App\Models\ProfileCompany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateProfileCompaniesTest extends TestCase
{
	use RefreshDatabase, WithoutEvents, WithoutMiddleware;

	protected function setUp(): void
    {
        parent::setUp();
    }

   /** @test */
    public function admin_user_can_create_profile_companies()
    {
      $this->signIn('admin');

      $response = $this->makeRequest();
      
      $response->assertStatus(302);
      $response->assertRedirect(route('profilecompany.index'));
      
      $profileCompanies = ProfileCompany::all();
      $this->assertEquals(1, $profileCompanies->count());
    }

    /** @test */
    public function public_user_cant_create_profile_companies()
    {
        $this->signIn('user');
        $response = $this->makeRequest();
        $response->assertStatus(401);
    }

    /**
     * @return TestResponse
     */
    private function makeRequest($attributes = []): TestResponse
    {
      Storage::fake('avatars');
      $logo = UploadedFile::fake()->image('avatar.jpg', 254, 48);

      Storage::fake('avatars');
      $favicon = UploadedFile::fake()->image('avatar1.jpg', 32, 32);

      $nowData = [
        'name_trade' => 'TestTrade',
        'name_legal' => 'TestLegal',
        'email' => 'test@test.test',
        'phone_local' => 'TestPhoneLocal',
        'phone_mobile' => 'TestPhoneMobile',
        'address_1' => 'TestAddress',
        'address_2' => 'TestAddress1',
        'city' => 'TestCity',
        'region' => 'TestRegion',
        'country' => 'TestContry',
        'logo' => $logo,
        'favicon' => $favicon,
      ];
      
      return $this->post(route('profilecompany.store'), array_merge($nowData, $attributes));
    }
    
}