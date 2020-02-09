<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDbLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_log', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->string('app', 32)->nullable()->comment('平台');
			$table->string('type', 50)->nullable()->comment('请求类型');
			$table->string('url')->nullable()->comment('请求url');
			$table->string('method', 100)->nullable()->comment('请求方法');
			$table->text('query', 65535)->nullable()->comment('执行语句');
			$table->string('time', 50)->nullable()->comment('执行时间');
			$table->dateTime('created_at')->nullable()->comment('创建时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_log');
	}

}
