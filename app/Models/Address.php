<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
		'email',
		'phone',
		'company',
		'country',
		'city',
		'code_postal',
		'address_1',
		'address_2',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}