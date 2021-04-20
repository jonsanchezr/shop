<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'category_id',
        'brand_id',
        'title',
        'short_description',
		'large_description',
		'amount',
        'unit',
		'slug',
        'slot_image_1',
        'slot_image_2',
        'slot_image_3',
        'slot_image_4',
        'slot_video',

    ];

    /**
     * The orders that belong to the products .
     */
    public function orders()
    {
        return $this->belongsToMany(
            'App\Models\Order', // model
            'order_products', //table
            'product_id', // id
            'order_id' // id
        );
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
