<?php

namespace Tests\Unit;

use App\Models\SocialNetwork;
use App\Models\ProfileCompany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class SocialNetworkTest extends TestCase
{
    private SocialNetwork $socialNetwork;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->socialNetwork = new SocialNetwork();
        $this->socialNetwork->profile_company_id = 1;
        $this->socialNetwork->name = 'Test';
        $this->socialNetwork->url = 'test';
    }

    /** @test */
    public function social_networks_belongs_to_profile_company()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->socialNetwork->profileCompany());
        $this->assertInstanceOf(ProfileCompany::class, $this->socialNetwork->profileCompany()->getModel());
    }
}
