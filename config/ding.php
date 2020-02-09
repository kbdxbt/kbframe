<?php

return [
    // 钉钉机器人组
    'group' => ['default', 'robot1', 'robot2', 'robot3', 'robot4'],
    // 默认发送的机器人

    'default' => [
        // 是否要开启机器人，关闭则不再发送消息
        'enabled' => env('DING_ENABLED',true),
        // 机器人的access_token
        'token' => env('DING_TOKEN',''),
        // 钉钉请求的超时时间
        'timeout' => env('DING_TIME_OUT',2.0),
        // 是否开启ss认证
        'ssl_verify' => env('DING_SSL_VERIFY',false),
        // 开启安全配置
        'secret' => env('DING_SECRET',false),
    ],

    'robot1' => [
        'enabled' => true,
        'token' => '',
        'timeout' => 2.0,
        'ssl_verify' => true,
        'secret' => true,
    ],

    'robot2' => [
        'enabled' => true,
        'token' => '',
        'timeout' => 2.0,
        'ssl_verify' => true,
        'secret' => true,
    ],

    'robot3' => [
        'enabled' => true,
        'token' => '',
        'timeout' => 2.0,
        'ssl_verify' => true,
        'secret' => true,
    ],

    'robot4' => [
        'enabled' => true,
        'token' => '',
        'timeout' => 2.0,
        'ssl_verify' => true,
        'secret' => true,
    ],

];
