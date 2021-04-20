<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
        'content',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
