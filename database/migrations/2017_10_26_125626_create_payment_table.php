<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('payment', function (Blueprint $table) {
            $table->increments('paymentID');
            $table->date('paymentDate');
              
            $table->integer('RefNo')->unsigned();
            $table->foreign('RefNo')->references('RefNo')->on('purchase');    
              
            $table->double('amount');
            $table->string('currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
