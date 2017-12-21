<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsertypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('usertypes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('types');
        $table->string('desc');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone_no');
        $table->integer('admin_id');
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
        Schema::dropIfExists('usertypes');
    }
}
