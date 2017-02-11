<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('job_type_id')->nullable();
            /**
             * User type:
             * 4 Person
             * 6 Company
             */
            $table->tinyInteger('user_type')->default(4);

            // General information
            $table->string('identifier')->nullable();//RUT
            $table->string('name')->nullable();//Name or "razon social"
            $table->string('last_name')->nullable();

            //company information
            $table->string('commercial_business')->nullable();
            $table->string('industry')->nullable();
            $table->string('address')->nullable();

            //company contact information
            $table->string('company_contact_name')->nullable();
            $table->string('company_contact_position')->nullable();
            $table->string('company_contact_email')->nullable();
            $table->string('company_contact_phone')->nullable();

            // person contact information
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('other')->nullable();

            // person location informaion
            $table->string('location_id')->nullable();
            $table->string('region_id')->nullable();

            // person optional curricular
            $table->string('employment_situation')->nullable();
            $table->string('experience')->nullable();
            $table->string('study_level')->nullable();
            $table->string('study_title')->nullable();
            $table->string('languages')->nullable();
            $table->string('curricular_other')->nullable();

            // person contact preferences
            $table->boolean('contact_preference_username')->default((int) FALSE);
            $table->boolean('contact_preference_name')->default((int) FALSE);
            $table->boolean('contact_preference_email')->default((int) FALSE);
            $table->boolean('contact_preference_phone')->default((int) FALSE);
            $table->boolean('contact_preference_other')->default((int) FALSE);


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
        Schema::dropIfExists('profiles');
    }
}
