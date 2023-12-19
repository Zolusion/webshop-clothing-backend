<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->string('product_image');
            $table->string('product_name');
            $table->decimal('product_price', 10, 2);
            $table->string('quantity');
            $table->softDeletes();
            $table->rememberToken();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('customer_city');
            $table->string('customer_country');
            $table->string('customer_zipcode');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->decimal('shipping_cost', 10, 2);
            $table->decimal('totalprice', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoppingcart');
    }
};
