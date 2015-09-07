<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');                       
            $table->string('business_name');
            $table->string('contact_name');            
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->integer('state_id')->unsigned();                       
            $table->string('zip');
            $table->string('logo');
            $table->text('comments');
            $table->enum('status', array('Active', 'Inactive'))->default('Inactive');
            $table->string('token');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        Schema::drop('providers');
    }
}
