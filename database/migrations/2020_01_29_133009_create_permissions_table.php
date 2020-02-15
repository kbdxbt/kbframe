<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->string('name', 191)->comment('权限标识');
			$table->string('guard_name', 191)->comment('权限组');
			$table->string('display_name', 191)->comment('权限名称');
			$table->string('route', 191)->nullable()->comment('路由名称');
			$table->integer('icon_id')->nullable()->comment('图标ID');
			$table->integer('parent_id')->default(0)->comment('上一级id');
			$table->integer('sort')->nullable()->default(0)->comment('排序');
			$table->timestamps();
			$table->boolean('status')->nullable()->default(1)->comment('状态[-1:删除;0:禁用;1启用]');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}
