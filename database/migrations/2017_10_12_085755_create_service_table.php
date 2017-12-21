<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serviceName');
            $table->string('serviceDesc');
            $table->string('serviceTNC');
            $table->string('serviceAvailableStart');
            $table->string('serviceAvailableEnd');
            $table->string('serviceValidPeriod');
            $table->string('serviceInstruction');
            $table->string('serviceLocation');
            $table->string('serviceType');
            $table->decimal('servicePrice',20,2);
            $table->string('serviceUnits');
            $table->string('serviceImage')->default("service.png");
            $table->string('serviceStatus')->default('ACTIVE');
            $table->string('storeID');
            $table->rememberToken();
            $table->timestamps();
        });//////
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');//
    }
}
