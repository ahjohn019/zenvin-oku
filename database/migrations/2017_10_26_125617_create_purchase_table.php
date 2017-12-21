<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchase', function (Blueprint $table) {
            $table->increments('RefNo');
             
            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('id')->on('users');
             
            $table->date('purchaseDate');
            $table->double('purchaseAmount');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
}
