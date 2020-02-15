<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActionLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('action_log', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('id');
			$table->string('app', 32)->nullable()->comment('平台');
			$table->integer('user_id')->nullable()->comment('用户id');
			$table->string('username', 50)->nullable()->comment('用户名');
			$table->string('type', 16)->nullable()->comment('类型');
			$table->string('group', 16)->nullable()->comment('分组');
			$table->integer('level')->nullable()->comment('等级');
			$table->string('url')->nullable()->comment('访问地址');
			$table->string('params')->nullable()->comment('参数');
			$table->string('remark')->nullable()->comment('备注');
			$table->string('status')->nullable()->comment('状态');
			$table->string('ip')->nullable()->comment('ip');
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
		Schema::drop('action_log');
	}

}
