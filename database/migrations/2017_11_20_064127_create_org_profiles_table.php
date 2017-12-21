<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->string('orgName');
            $table->string('orgNo')->unique();
            $table->string('contact_person');
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
        Schema::dropIfExists('org_profiles');
    }
}
