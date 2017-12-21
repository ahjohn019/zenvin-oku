<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('storeName')->unique();
            $table->string('storeDesc');
            $table->string('image') ->default('store.png');
            $table->string('private_id');
            $table->string('status') ->default('Active');
            $table->string('orgID');
            $table->integer('merchantID')->unsigned();
            $table->foreign('merchantID')->references('merchantID')->on('merchant');
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
        Schema::dropIfExists('stores');
    }
}
