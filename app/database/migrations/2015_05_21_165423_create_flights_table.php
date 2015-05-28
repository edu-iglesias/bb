<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flights', function(Blueprint $table)
		{
			$table->increments('flight_number');

			$table->string('departure_flight_name');
			$table->string('departure_route');
			$table->string('departure_flight_frequency');
			$table->time('departure_time');
			$table->time('departure_arrival');


			$table->string('return_flight_name');
			$table->string('return_route');
			$table->string('return_flight_frequency');
			$table->time('return_time');
			$table->time('return_arrival');

			$table->string('price');

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
		Schema::drop('flights');
	}

}
