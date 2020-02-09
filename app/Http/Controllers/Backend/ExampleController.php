<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\MailerQueue;
use App\Jobs\LogQueue;
use App\Jobs\SmsQueue;
use App\Services\LogService;
use App\Services\MailerService;
use App\Services\SmsService;
use Bschmitt\Amqp\Facades\Amqp;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * Class ExampleController 示例控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class ExampleController extends BaseController
{
    // Direct Exchange 模式的交换机适合用于消息的单播发送. 交换机根据推送消息时的 routing key 和 队列的 routing key
    // 判断消息应该推送到哪个队列. 可以实现同一交换机上的消息, 根据 routing key 推送到不同的队列中.
    public function rbmqDirect()
    {
        // 可以设置自定义消息格式
        // $properties = ['content_type' => 'application/json', 'delivery_mode' => 2];
        // $message = Amqp::message(json_encode(['消息1','消息2']), $properties);

        // 修改 routing key 以后消费者将接收不到信息
        Amqp::publish('test_direct', 'Direct消息' , [
            'exchange_type' => 'direct',
            'exchange' => 'rbmq.direct',
        ]);
    }

    // 广播模式，不需要设置任何的路由和队列，只要是该交换机下的所有队列都会收到信息
    //该模式下的交换机是广播模式, 交换机会向所有绑定的队列分发消息, 不需要设置交换机和队列的 routing key. 即使设置了, 也会被忽略.
    public function rbmqFanout()
    {
        Amqp::publish('', 'Fanout消息' , [
            'exchange_type' => 'fanout',
            'exchange' => 'amq.fanout',
        ]);
    }

    // TOPIC模式，需要设置路由，对应绑定该路由模糊匹配下的队列会收到信息
    //此模式下交换机，在推送消息时, 会根据消息的主题词和队列的主题词决定将消息推送到哪个队列. 交换机只会为 Queue 分发符合其指定的主题的消息。
    public function rbmqTopic()
    {
        Amqp::publish('test.topic', 'Topic消息' , [
            'exchange_type' => 'topic',
            'exchange' => 'test.topic',
        ]);
    }

    /**
     * 发送邮件
     */
    public function sendMail(MailerService $service)
    {
        // 使用队列发送
        //MailerQueue::dispatch('8888888@qq.com', '测试邮件');
        // 实时发送
        //MailerQueue::dispatchNow('8888888@qq.com', '测试邮件');
        // 批量发送
        //for ($i = 0; $i < 10; $i++) {
        //    MailerQueue::dispatch('8888888@qq.com', '测试邮件');
        //}
        $service->setConfig(false)->realSend('8888888@qq.com', '测试邮件');
    }

    /**
     * 发送短信
     */
    public function sendSms(SmsService $service)
    {
        // 使用队列发送
        //SmsQueue::dispatch('18888888888', rand(1000, 9999));
        // 实时发送
        //SmsQueue::dispatchNow('18888888888', rand(1000, 9999));
        // 批量发送
        //for ($i = 0; $i < 10; $i++) {
        //    SmsQueue::dispatch('18888888888', rand(1000, 9999));
        //}
        $service->setConfig(true)->realSend('18888888888', rand(1000, 9999));
    }

    /**
     * 保存日志
     */
    public function saveLog(LogService $service)
    {
        // 使用队列添加日志
        //LogQueue::dispatch('req');
        $service->setDb('mysql')->realSave('action', [
            'group' => 'user',
            'level' => '1',
            'params' => '',
            'remark' => '用户登录',
            'status' => '1'
        ]);
    }

    /**
     * 并发请求
     */
    public function multiCurl()
    {
        // 文档 http://docs.guzzlephp.org/en/latest/quickstart.html#making-a-request
        $client = new Client();

        $requests = function ($total) {
            $uri = 'http://www.baidu.com';
            for ($i = 0; $i < $total; $i++) {
                yield new Request('GET', $uri);
            }
        };

        $pool = new Pool($client, $requests(100), [
            'concurrency' => 5, //一次并发的请求数
            'fulfilled' => function (Response $response, $index) {
                // 处理成功的请求
                echo $index.'-success<br/>';
            },

            'rejected' => function (RequestException $reason, $index) {
                // 处理失败的请求
                echo $index.'-failed<br/>';
            },
        ]);

        // 启动
        $promise = $pool->promise();

        // 强制完成请求
        $promise->wait();
    }
}
