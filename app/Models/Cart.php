<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_image',
        'product_name',
        'product_price',
        'quantity',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_city',
        'customer_country',
        'customer_zipcode',
        'shipping_method',
        'payment_method',
        'shipping_cost',
        'totalprice',
        'order_status'
    ];
}
