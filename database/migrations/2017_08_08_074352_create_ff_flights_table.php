<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFfFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ff_flights', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->dateTime('arrival');
			$table->dateTime('departure');
			$table->string('destintation_id', 36)->index('fk_FF_flights_FF_airports2_idx');
			$table->string('orgin_id', 36)->index('fk_FF_flights_FF_airports1_idx');
			$table->string('airline_id', 36)->index('fk_FF_flights_FF_airlines1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ff_flights');
	}

}
