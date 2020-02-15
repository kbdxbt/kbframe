<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notify', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->comment('主键');
			$table->string('title', 150)->nullable()->default('')->comment('标题');
			$table->text('content', 65535)->nullable()->comment('消息内容');
			$table->boolean('type')->nullable()->default(0)->comment('消息类型[1:公告;2:提醒;3:信息(私信)');
			$table->integer('target_id')->nullable()->default(0)->comment('目标id');
			$table->string('target_type', 100)->nullable()->default('')->comment('目标类型');
			$table->integer('target_display')->nullable()->default(1)->comment('接受者是否删除');
			$table->string('action', 100)->nullable()->default('')->comment('动作');
			$table->integer('view')->nullable()->default(0)->comment('浏览量');
			$table->integer('sender_id')->nullable()->default(0)->comment('发送者id');
			$table->boolean('sender_display')->nullable()->default(1)->comment('发送者是否删除');
			$table->boolean('sender_withdraw')->nullable()->default(1)->comment('是否撤回 0是撤回');
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
		Schema::drop('notify');
	}

}
