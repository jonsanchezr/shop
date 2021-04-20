<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsIndex extends Model
{
    protected $table = 'ads_index';
    
     protected $fillable = [
        'title',
        'image',
        'url',
    ];
}