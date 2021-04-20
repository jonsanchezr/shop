<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsCategory extends Model
{
    
     protected $fillable = [
        'title',
        'image',
        'url',
    ];
}