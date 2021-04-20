<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $fillable = [
        'name',
        'slug',
		'logo',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function sliders()
    {
        return $this->hasMany('App\Models\Slider');
    }
}
