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

		$this->call('RoleSeeder');
		$this->command->info('The Role table has been seeded.');

		$this->call('AdminSeeder');
		$this->command->info('The Admin user has been seeded.');

		$this->call('BankManagerSeeder');
		$this->command->info('The Bank Manager users has been seeded.');

		$this->call('BankAssistantSeeder');
		$this->command->info('The Bank Assistant user has been seeded.');

		$this->call('TellerSeeder');
		$this->command->info('The Teller user has been seeded.');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Return foreign key constraint
	}

}
