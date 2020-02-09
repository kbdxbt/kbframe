<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReqLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('req_log', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->string('app', 32)->nullable()->comment('平台');
			$table->integer('user_id')->nullable()->comment('用户id');
			$table->string('method', 100)->nullable()->comment('请求方法');
			$table->string('route', 100)->nullable()->comment('路由名称');
			$table->string('action', 100)->nullable()->comment('请求方法');
			$table->string('url')->nullable()->comment('请求地址');
			$table->string('path', 100)->nullable()->comment('请求路径');
			$table->text('res_data', 65535)->nullable()->comment('请求数据');
			$table->text('header_data', 65535)->nullable()->comment('请求头数据');
			$table->string('ip', 100)->nullable()->comment('ip');
			$table->string('http_code', 10)->nullable()->comment('http状态码');
			$table->string('port', 10)->nullable()->comment('端口');
			$table->string('format_type', 10)->nullable()->comment('数据类型');
			$table->string('error_code', 10)->nullable()->comment('错误码');
			$table->text('error_data', 65535)->nullable()->comment('错误数据');
			$table->string('device')->nullable()->comment('设置名称');
			$table->string('version', 100)->nullable()->comment('版本');
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
		Schema::drop('req_log');
	}

}
