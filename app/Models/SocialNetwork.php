<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
     protected $fillable = [
        'profile_company_id',
        'name',
        'url',
    ];

    public function profileCompany()
    {
        return $this->belongsTo('App\Models\ProfileCompany');
    }
}