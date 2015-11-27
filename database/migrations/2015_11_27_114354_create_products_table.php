<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->integer('category_id');
			$table->integer('user_id');
			$table->string('picture');
			$table->decimal('price', 10, 2);
			$table->string('pricing_type', '20');
			$table->decimal('quantity', 10, 2);
			$table->string('unit', 10);
			$table->date('expiry_date');
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
		Schema::drop('products');
	}

}
