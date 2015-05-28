<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Removes foreign key constraint

		Eloquent::unguard();

		$this->call('FlightSeeder');
		$this->command->info('The Flight table has been seeded.');

		$this->call('SeatSeeder');
		$this->command->info('The Seat table has been seeded.');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Return foreign key constraint
	}

}
