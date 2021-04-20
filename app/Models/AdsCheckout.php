<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsCheckout extends Model
{
    protected $table = 'ads_checkout';
     protected $fillable = [
        'title',
        'image',
        'url',
    ];
}