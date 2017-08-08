<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFfAirportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ff_airports', function(Blueprint $table)
		{
			$table->foreign('contry_id', 'fk_FF_airports_FF_contries')->references('id')->on('ff_contries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ff_airports', function(Blueprint $table)
		{
			$table->dropForeign('fk_FF_airports_FF_contries');
		});
	}

}
