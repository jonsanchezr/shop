<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'identity',
        'avatar',
		
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}