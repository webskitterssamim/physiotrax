<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('country_name', 60);
            $table->string('country_iso_code_2', 10);
            $table->string('country_iso_code_3', 10);
            $table->integer('country_format_id')->unsigned();
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
        Schema::drop('countries');
    }
}
