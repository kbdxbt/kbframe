<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->string('name', 191)->comment('角色标识');
			$table->string('guard_name', 191)->comment('角色组');
			$table->string('display_name', 191)->nullable()->comment('角色名称');
			$table->integer('sort')->nullable()->default(0)->comment('排序');
			$table->boolean('status')->nullable()->default(1)->comment('状态[-1:删除;0:禁用;1启用]');
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
		Schema::drop('roles');
	}

}
