<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    protected $table = 'profile_company';
     protected $fillable = [
        'name_trade',
        'name_legal',
        'email',
        'phone_local',
        'phone_mobile',
        'address_1',
        'address_2',
        'city',
        'region',
        'country',
        'logo',
        'favicon',
    ];

        public function socialNetworks()
    {
        return $this->hasMany('App\Models\SocialNetwork');
    }
}