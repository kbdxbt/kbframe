<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('id', true)->comment('主键');
			$table->string('username', 20)->nullable()->default('')->index('username')->comment('帐号');
			$table->string('password', 150)->nullable()->default('')->comment('密码');
			$table->string('auth_key', 32)->nullable()->default('')->comment('授权令牌');
			$table->string('remember_token', 150)->nullable()->default('')->comment('Token令牌');
			$table->boolean('type')->nullable()->default(1)->comment('类别[1:普通会员;10管理员]');
			$table->string('nickname', 50)->nullable()->default('')->comment('昵称');
			$table->string('realname', 50)->nullable()->default('')->comment('真实姓名');
			$table->string('head_portrait', 150)->nullable()->default('')->comment('头像');
			$table->boolean('gender')->nullable()->default(0)->comment('性别[0:未知;1:男;2:女]');
			$table->string('qq', 20)->nullable()->default('')->comment('qq');
			$table->string('email', 60)->nullable()->default('')->comment('邮箱');
			$table->date('birthday')->nullable()->comment('生日');
			$table->integer('visit_count')->unsigned()->nullable()->default(1)->comment('访问次数');
			$table->string('home_phone', 20)->nullable()->default('')->comment('家庭号码');
			$table->string('mobile', 20)->nullable()->default('')->index('mobile')->comment('手机号码');
			$table->integer('last_time')->nullable()->default(0)->comment('最后一次登录时间');
			$table->string('last_ip', 16)->nullable()->default('')->comment('最后一次登录ip');
			$table->integer('pid')->unsigned()->nullable()->default(0)->comment('上级id');
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
		Schema::drop('users');
	}

}
