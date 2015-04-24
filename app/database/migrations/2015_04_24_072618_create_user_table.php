<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 30);
			$table->string('password');
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->integer('user_type');
			$table->string('gender', 10);
			$table->string('address', 255);
			$table->string('contact', 15);
			$table->integer('status')->default(1);
			$table->timestamps();
			$table->string('remember_token')->default(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
