<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

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
			$table->string('name');
			$table->string('phone_no',20)->unique();
			$table->string('house');
			$table->string('village',30);
			$table->string('post_office',30);
			$table->string('post_code',6)->nullAble();
			$table->string('thana',30);
			$table->string('district',30);
			$table->string('password', 60);
			$table->string('picture')->nullAble();
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
