<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'imageurl',
        'productname',
        'description',
        'category',
        'categoryid',
        'oldprice',
        'newprice',
        'quantity',
        'slug',
    ];
}
