<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
     protected $fillable = [
        'brand_id',
        'title',
        'amount',
        'url',
        'image',
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

}