<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FhAdminusers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('adminusers', function(Blueprint $table)
            {
                    $table->increments('id');
                    $table->string('name');
                    $table->string('image');
		    $table->string('phone');
                    $table->string('email')->unique();
                    $table->string('password', 60);
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
            Schema::drop('adminusers');
	}

}
