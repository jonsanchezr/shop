<?php

namespace Tests\Unit;

use App\Models\ProfileCompany;
use App\Models\SocialNetwork;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class ProfileCompanyTest extends TestCase
{
    private ProfileCompany $profileCompany;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->profileCompany = new ProfileCompany();
        $this->profileCompany->name_trade = 'TestTrade';
        $this->profileCompany->name_legal = 'TestLegal';
        $this->profileCompany->email = 'test@test.test';
        $this->profileCompany->phone_local = 'TestPhoneLocal';
        $this->profileCompany->phone_mobile = 'TestPhoneMobile';
        $this->profileCompany->address_1 = 'TestAddress';
        $this->profileCompany->address_2 = 'TestAddress1';
        $this->profileCompany->city = 'TestCity';
        $this->profileCompany->region = 'TestRegion';
        $this->profileCompany->country = 'TestContry';
        $this->profileCompany->logo = 'logo.png';
        $this->profileCompany->favicon = 'favicon.png';
    }

    /** @test */
    public function profile_company_has_many_social_networks()
    {
        $this->assertInstanceOf(HasMany::class, $this->profileCompany->socialNetworks());
        $this->assertInstanceOf(SocialNetwork::class, $this->profileCompany->socialNetworks()->getModel());
    }
}
