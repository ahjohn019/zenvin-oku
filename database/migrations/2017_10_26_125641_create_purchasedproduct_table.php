<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('purchaseproduct', function (Blueprint $table) {            
              
            $table->integer('RefNo')->unsigned();
            $table->foreign('RefNo')->references('RefNo')->on('purchase');
              
            $table->integer('productID')->unsigned()->nullable();;  
            $table->foreign('productID')->references('id')->on('products');
              
            $table->integer('purchaseQuantity');

        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaseproduct');
    }
}
