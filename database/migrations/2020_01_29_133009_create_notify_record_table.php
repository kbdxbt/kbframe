<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifyRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notify_record', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->unsigned()->default(0)->comment('管理员id');
			$table->integer('notify_id')->nullable()->default(0)->comment('消息id');
			$table->boolean('is_read')->nullable()->default(0)->comment('是否已读 1已读');
			$table->boolean('type')->nullable()->default(0)->comment('消息类型[1:公告;2:提醒;3:信息(私信)');
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
		Schema::drop('notify_record');
	}

}
