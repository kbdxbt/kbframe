<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIconTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('icon', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('unicode', 191)->nullable()->comment('unicode 字符');
			$table->string('class', 191)->nullable()->comment('类名');
			$table->string('name', 191)->nullable()->comment('名称');
			$table->integer('sort')->default(0)->comment('排序');
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
		Schema::drop('icon');
	}

}
