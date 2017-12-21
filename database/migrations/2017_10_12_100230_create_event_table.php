<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventName');
            $table->string('eventDesc');
            $table->string('eventImage')->default("event.png");
            $table->string('eventStartDate');
            $table->string('eventEndDate');
            $table->String('eventStartTime');
            $table->String('eventEndTime');
            $table->string('eventLocation');
            $table->string('eventType');
            $table->decimal('eventPrice',20,2);
            $table->decimal('eventCouponPrice',20,2)->default("0");
            $table->string('eventCouponDesc');
            $table->string('eventStatus')->default('ACTIVE');
            $table->integer('orgID')->nullable();
            $table->timestamps();

        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');//
    }
}
