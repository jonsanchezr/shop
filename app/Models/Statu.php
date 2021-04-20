<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
     protected $fillable = [

        'name',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}