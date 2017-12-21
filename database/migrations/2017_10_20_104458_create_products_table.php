<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productName');
            $table->string('productDesc');
            $table->decimal('productPrice',20,2);
            $table->string('productImage1')->default("product.png");
            $table->string('productImage2')->default("product.png");
            $table->string('productImage3')->default("product.png");
            $table->string('productQuantity');
            $table->decimal('productWeight',20,3);
            $table->decimal('deliveryEM',20,2);
            $table->decimal('deliveryWM',20,2);
            $table->string('productCategory');
            $table->string('productStatus')->default('ACTIVE');
            $table->string('productPromo');
            $table->string('storeID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
