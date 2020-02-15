<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Define which configuration should be used
    |--------------------------------------------------------------------------
    */

    'use' => 'production',

    /*
    |--------------------------------------------------------------------------
    | AMQP properties separated by key
    | AMQP key (method name) and methods (class implement Bschmitt\Amqp\Rpc\RpcHandlerInterface)
    |--------------------------------------------------------------------------
    */
    'methods' => [
        'myProcedure' => Bschmitt\Amqp\Rpc\ExampleRpc::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | AMQP properties separated by key
    |--------------------------------------------------------------------------
    */
    'properties' => [

        'production' => [
            'host'                  => env('RABBITMQ_HOST', '127.0.0.1'),
            'port'                  => env('RABBITMQ_PORT', 5672),
            'username'              => env('RABBITMQ_LOGIN', 'guest'),
            'password'              => env('RABBITMQ_PASSWORD', 'guest'),
            'vhost'                 => env('RABBITMQ_VHOST', '/'),
            'content_type'          => 'application/json',
            'connect_options'       => [],
            'ssl_options'           => [],

            'exchange'              => 'amq.topic',
            'exchange_type'         => 'topic',
            'exchange_passive'      => false,
            'exchange_durable'      => true,
            'exchange_auto_delete'  => false,
            'exchange_internal'     => false,
            'exchange_nowait'       => false,
            'exchange_properties'   => [],

            'queue_force_declare'   => false,
            'queue_passive'         => false,
            'queue_durable'         => true,
            'queue_exclusive'       => false,
            'queue_auto_delete'     => false,
            'queue_nowait'          => false,
            'queue_properties'      => ['x-ha-policy' => ['S', 'all']],

            'consumer_tag'          => '',
            'consumer_no_local'     => false,
            'consumer_no_ack'       => false,
            'consumer_exclusive'    => false,
            'consumer_nowait'       => false,
            'timeout'               => 0,
            'persistent'            => false,

            'queue'                 => 'worker',
            'rpc_queue'             => 'rpc-worker',

            'qos'                   => false,
            'qos_prefetch_size'     => 0, // 最大unacked消息的字节数；
            'qos_prefetch_count'    => 1, //最大unacked消息的条数；
            'qos_a_global'          => false //上述限制的限定对象，false=限制单个消费者；true=限制整个信道
        ],

    ],

];
