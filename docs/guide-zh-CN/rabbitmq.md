## RabbitMq 使用
框架封装了RabbitMq的3个常用Exchange模式的使用，Direct(直连模式)、Fanout(广播模式)、Topic(主题模式)，可以根据自己需求使用对应的模式，开箱即用。同时框架封装了通过控制台模式进行消费的使用。
## 生产者(Publisher)
* Direct(直连模式)<br>
Direct Exchange 模式的交换机适合用于消息的单播发送. 交换机根据推送消息时的 routing key 和 队列的 routing key,
判断消息应该推送到哪个队列. 可以实现同一交换机上的消息, 根据 routing key 推送到不同的队列中.
```php
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
```
* Fanout(广播模式)<br>
Fanout模式，不需要设置任何的路由和队列，只要是该交换机下的所有队列都会收到信息,该模式下的交换机是广播模式, 交换机会向所有绑定的队列分发消息, 不需要设置交换机和队列的 routing key. 即使设置了, 也会被忽略.
```php
public function rbmqFanout()
{
     Amqp::publish('', 'Fanout消息' , [
         'exchange_type' => 'fanout',
         'exchange' => 'amq.fanout',
     ]);
}
```
* Topic(主题模式)<br/>
TOPIC模式，需要设置路由，对应绑定该路由模糊匹配下的队列会收到信息，此模式下交换机，在推送消息时, 会根据消息的主题词和队列的主题词决定将消息推送到哪个队列. 交换机只会为 Queue 分发符合其指定的主题的消息。
```php
public function rbmqTopic()
{
     Amqp::publish('test.topic', 'Topic消息' , [
         'exchange_type' => 'topic',
         'exchange' => 'test.topic',
     ]);
}
```
## 消费者(Consumer)
框架封装了通过控制台模式进行消费的使用
```php
php artisan rabbitmq:[--type] 
```
```php
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
        // FANOUT模式，不需要设置任何的路由和队列，只要是该交换机下的所有队列都会收到信息
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
```