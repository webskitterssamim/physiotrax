<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sitesettings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sitesettings_name');
			$table->enum('sitesettings_type', array('TEXT', 'COMBO', 'CHECKBOX', 'TEXTAREA', 'SELECT'));
			$table->enum('sitesettings_data_type', array('TEXT', 'NUMERIC'));
			$table->string('sitesettings_lebel');
			$table->string('sitesettings_value');
			$table->text('status', array('Active', 'Inactive'));
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
		Schema::drop('sitesettings');
	}

}
