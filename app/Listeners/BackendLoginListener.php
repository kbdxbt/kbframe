<?php

/*
 *
 */

namespace App\Listeners;

use App\Events\BackendLoginEvent;
use App\Services\LogService;

/**
 * Class BackendLoginListener 后台登录监听
 * @package App\Listeners
 * @author kbdxbt <1194174530@qq.com>
 */
class BackendLoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param AdministratorLoginSuccessEvent $event
     */
    public function handle(AdminLoginEvent $event)
    {
        app(LogService::class)->setConfig('', 'mysql')->realSave('action', [
            'group' => 'user',
            'level' => '1',
            'params' => '',
            'remark' => '用户登录',
            'status' => '1'
        ]);

        $admin = $event->admin;

        $admin->visit_count += 1;
        $admin->last_ip = request()->getClientIp();
        $admin->last_time = time();
        $admin->save();
    }
}
