<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = [
        'title',
        'description',
		'slug',
		'image',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function settingTopcategories()
    {
        return $this->hasMany('App\Models\SettingTopcategory');
    }

}
