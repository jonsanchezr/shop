<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
     protected $fillable = [
        'name',
        'description',
		'delivery_time',
		'price',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}