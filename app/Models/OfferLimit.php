<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferLimit extends Model
{
     protected $fillable = [
        'title',
        'subtitle',
        'description',
        'url',
        'image',
        'date_end',
    ];
}