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

class UpdateProfileCompaniesTest extends TestCase
{
    use RefreshDatabase, WithoutEvents, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function admin_user_can_update_profile_companies()
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

        $response = $this->makeRequest($profileCompany->id, [
            'name_trade' => 'TestTradeActualizado',
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
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('profilecompany.index'));

        $this->assertEquals('TestTradeActualizado', $profileCompany->fresh()->name_trade);
    }

    /** @test */
    public function public_user_cant_update_profile_companies()
    {
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


        $this->signIn('user');
        $response = $this->makeRequest($profileCompany->id);
        $response->assertStatus(401);
    }

    /**
     * @param array $attributes
     * @return TestResponse
     */
    private function makeRequest($id, $attributes = []): TestResponse
    {
        return $this->put(route('profilecompany.update', $id), $attributes);
    }
}
