<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->integer('org_id');
            $table->string('name');
            $table->string('nric')->unique();
            $table->string('disability');
            $table->string('nOku')->unique()->nullable();
            $table->string('gender');
            $table->string('contactNo')->unique();
            $table->mediumText('address');
            $table->string('state');
            $table->string('postCode');
            $table->string('profile_image');
            $table->string('certificate_doc');
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
        Schema::dropIfExists('private_profiles');
    }
}
