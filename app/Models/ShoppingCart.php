<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ShoppingCart extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'product_image',
        'product_name',
        'product_price' => 'decimal:2',
        'quantity',
        'deleted_at',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_city',
        'customer_country',
        'customer_zipcode',
        'shipping_method',
        'payment_method',
        'shipping_cost' => 'decimal:2',
        'totalprice' => 'decimal:2',
    ];
}
