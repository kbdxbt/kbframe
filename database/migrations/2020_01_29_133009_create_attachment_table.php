<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('drive', 50)->nullable()->default('')->comment('驱动');
			$table->string('upload_type', 10)->nullable()->default('')->comment('上传类型');
			$table->string('specific_type', 100)->default('')->comment('类别');
			$table->string('base_url', 1000)->nullable()->default('')->comment('url');
			$table->string('path', 1000)->nullable()->default('')->comment('本地路径');
			$table->string('md5', 100)->nullable()->default('')->index('md5')->comment('md5校验码');
			$table->string('name', 1000)->nullable()->default('')->comment('文件原始名');
			$table->string('extension', 50)->nullable()->default('')->comment('扩展名');
			$table->integer('size')->nullable()->default(0)->comment('长度');
			$table->integer('year')->unsigned()->nullable()->default(0)->comment('年份');
			$table->integer('month')->nullable()->default(0)->comment('月份');
			$table->integer('day')->unsigned()->nullable()->default(0)->comment('日');
			$table->string('upload_ip', 16)->nullable()->default('')->comment('上传者ip');
			$table->boolean('status')->default(1)->comment('状态[-1:删除;0:禁用;1启用]');
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
		Schema::drop('attachment');
	}

}
