<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoverLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_letters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('job_type_id');

            $table->string('name');
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->text('reason')->nullable();

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
        Schema::dropIfExists('cover_letters');
    }
}
