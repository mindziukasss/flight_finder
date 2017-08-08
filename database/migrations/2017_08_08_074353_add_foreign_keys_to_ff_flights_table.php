<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFfFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ff_flights', function(Blueprint $table)
		{
			$table->foreign('airline_id', 'fk_FF_flights_FF_airlines1')->references('id')->on('ff_airlines')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('orgin_id', 'fk_FF_flights_FF_airports1')->references('id')->on('ff_airports')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('destintation_id', 'fk_FF_flights_FF_airports2')->references('id')->on('ff_airports')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ff_flights', function(Blueprint $table)
		{
			$table->dropForeign('fk_FF_flights_FF_airlines1');
			$table->dropForeign('fk_FF_flights_FF_airports1');
			$table->dropForeign('fk_FF_flights_FF_airports2');
		});
	}

}
