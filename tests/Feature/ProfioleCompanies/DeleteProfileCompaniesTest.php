<?php

namespace Tests\Feature\ProfileCompanies;

use App\Models\ProfileCompany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DeleteProfileCompaniesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_delete_profile_companies()
    {
        $this->signIn('admin');

        Storage::fake('avatars');
        $logo = UploadedFile::fake()->image('avatar.jpg', 254, 48);

        Storage::fake('avatars');
        $favicon = UploadedFile::fake()->image('avatar1.jpg', 32, 32);

        $profileCompany = new ProfileCompany;
        $profileCompany->name_trade = 'TestTrade';
        $profileCompany->name_legal = 'TestLegal';
        $profileCompany->email = 'test@test.test';
        $profileCompany->phone_local = 'TestPhoneLocal';
        $profileCompany->phone_mobile = 'TestPhoneMobile';
        $profileCompany->address_1 = 'TestAddress';
        $profileCompany->address_2 = 'TestAddress1';
        $profileCompany->city = 'TestCity';
        $profileCompany->region = 'TestRegion';
        $profileCompany->country = 'TestContry';
        $profileCompany->logo = $logo;
        $profileCompany->favicon = $favicon;
        $profileCompany->save();

        $response = $this->makeRequest($profileCompany->id);

        $response->assertStatus(302);
        $response->assertRedirect(route('profilecompany.index'));

        $profileCompanies = ProfileCompany::all();
      $this->assertEquals(0, $profileCompanies->count());
    }

     /** @test */
    public function public_user_cant_delete_profile_companies()
    {
    	$this->signIn('user');

        Storage::fake('avatars');
        $logo = UploadedFile::fake()->image('avatar.jpg', 254, 48);

        Storage::fake('avatars');
        $favicon = UploadedFile::fake()->image('avatar1.jpg', 32, 32);

        $profileCompany = new ProfileCompany;
        $profileCompany->name_trade = 'TestTrade';
        $profileCompany->name_legal = 'TestLegal';
        $profileCompany->email = 'test@test.test';
        $profileCompany->phone_local = 'TestPhoneLocal';
        $profileCompany->phone_mobile = 'TestPhoneMobile';
        $profileCompany->address_1 = 'TestAddress';
        $profileCompany->address_2 = 'TestAddress1';
        $profileCompany->city = 'TestCity';
        $profileCompany->region = 'TestRegion';
        $profileCompany->country = 'TestContry';
        $profileCompany->logo = $logo;
        $profileCompany->favicon = $favicon;
        $profileCompany->save();
        
        $response = $this->makeRequest($profileCompany->id);

        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->delete(route('profilecompany.destroy', $id), $attributes);
    }
}