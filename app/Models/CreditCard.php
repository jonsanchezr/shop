<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
     protected $fillable = [
        'user_id',
        'card_number',
        'name',
		'expire',
		'cvc',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}