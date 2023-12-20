<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('product_image')->default('https://via.placeholder.com/150');
            $table->string('product_name')->default('Product Name');
            $table->string('product_price')->default('0');
            $table->string('quantity')->default('25');
            $table->string('customer_name')->default('John Doe');
            $table->string('customer_email')->default('b2nZc@example.com');
            $table->string('customer_phone')->default('0612345678');
            $table->string('customer_address')->default('Amsterdam');
            $table->string('customer_city')->default('Amsterdam');
            $table->string('customer_country')->default('Netherland');
            $table->string('customer_zipcode')->default('00000');
            $table->string('shipping_method')->default('Standard Shipping');
            $table->string('payment_method')->default('Cash On Delivery');
            $table->string('total_price')->default('0');
            $table->string('order_status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
