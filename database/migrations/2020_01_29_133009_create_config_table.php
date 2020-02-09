<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config', function(Blueprint $table)
		{
			$table->increments('id')->comment('配置ID');
			$table->string('app', 32)->comment('配置用途');
			$table->string('title', 32)->default('')->comment('配置标题');
			$table->string('name', 32)->nullable()->unique('name')->comment('配置名称');
			$table->text('value', 65535)->comment('配置值');
			$table->boolean('group')->default(0)->comment('配置分组');
			$table->string('type', 16)->default('')->comment('配置类型');
			$table->string('options')->default('')->comment('配置额外值');
			$table->string('tip', 100)->default('')->comment('配置说明');
			$table->boolean('sort')->default(0)->comment('排序');
			$table->boolean('status')->default(0)->comment('状态');
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
		Schema::drop('config');
	}

}
