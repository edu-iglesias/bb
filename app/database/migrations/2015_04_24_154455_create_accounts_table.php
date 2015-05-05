<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('password', 255);
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 30);
			$table->string('gender', 10);
			$table->string('address', 255);
			$table->string('contact', 15);
			$table->string('balance', 255);
			$table->string('type', 10);
			$table->string('life_span', 50);
			$table->integer('status')->default(1);
			$table->timestamps();
		});

		$statement = "ALTER TABLE accounts AUTO_INCREMENT = 111110000;";

        DB::unprepared($statement);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
