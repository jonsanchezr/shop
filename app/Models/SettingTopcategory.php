<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTopcategory extends Model
{
	
     protected $fillable = [
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}