<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
     protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
