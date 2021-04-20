<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'address_id',
        'payment_method_id',
        'statu_id',
        'shipping_company_id',
        'total',
        'subtotal',
        'tax',
    ];

    /**
     * The orders that belong to the products .
     */
    public function products()
    {
        return $this->belongsToMany(
            'App\Models\Product', // model
            'order_products', //table
            'order_id', // id
            'product_id' // id
        );
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    public function statu()
    {
        return $this->belongsTo('App\Models\Statu');
    }

    public function shippingCompany()
    {
        return $this->belongsTo('App\Models\ShippingCompany');
    }
}