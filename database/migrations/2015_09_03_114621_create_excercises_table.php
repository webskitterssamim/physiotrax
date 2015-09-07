<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excercises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('creator');
            $table->string('sets');
            $table->string('reps');
            $table->string('weight');
            $table->string('frequency');
            $table->string('hold_time');
            $table->string('rest_time');
            $table->string('surface');
            $table->string('youtube_url');
            $table->text('description');
             $table->enum('status', array('Active', 'Inactive'))->default('Active');
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
        Schema::drop('excercises');
    }
}

