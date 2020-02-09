<?php

namespace App\Console\Commands;

use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Console\Command;

/**
 * Class RabbitMq Rbmq消费数据
 * @package App\Console\Commands
 * @author kbdxbt <1194174530@qq.com>
 */
class RabbitMq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consume {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rabbitmq consume';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $type = $this->argument('type');

        if ($type == 'direct') {
            // DIRECT模式，需要设置路由，对应绑定该路由下的队列会收到信息
            Amqp::consume('test.direct', function ($message, $resolver) {
                var_dump($message->body);
                $resolver->acknowledge($message);
                //接收到消息停止进程
                //$resolver->stopWhenProcessed();
            }, [
                'routing' => 'test_direct',
                'exchange' => 'rbmq.direct',
                'exchange_type' => 'direct',
                'persistent' => true // required if you want to listen forever
            ]);
        } elseif ($type == 'fanout') {
            // 广播模式，不需要设置任何的路由和队列，只要是该交换机下的所有队列都会收到信息
            Amqp::consume('', function ($message, $resolver) {
                var_dump($message->body);
                $resolver->acknowledge($message);
            }, [
                'exchange' => 'amq.fanout',
                'exchange_type' => 'fanout',
                'queue_force_declare' => true,
                'queue_exclusive' => true,
                'persistent' => true // required if you want to listen forever
            ]);
        } elseif ($type == 'topic') {
            // TOPIC模式，需要设置路由，对应绑定该路由模糊匹配下的队列会收到信息
            // 可以使用通配符: "#": 表示 0 或多个主题词; "*": 表示 1 个主题词.
            Amqp::consume('test-topic', function ($message, $resolver) {
                var_dump($message->body);
                $resolver->acknowledge($message);
            }, [
                'routing' => '#.topic', // *.red 都可以
                'exchange' => 'test.topic',
                'exchange_type' => 'topic',
                'persistent' => true // required if you want to listen forever
            ]);
        }
    }
}
