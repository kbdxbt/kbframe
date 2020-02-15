<?php

namespace App\Services;

use App\Jobs\SmsQueue;
use Overtrue\EasySms\EasySms;

/**
 * Class SmsService 短信服务类
 * @package services\common
 * @author kbdxbt <1194174530@qq.com>
 */
class SmsService
{
    /**
     * 队列开关
     *
     * @var bool
     */
    protected $queueSwitch = false;

    /**
     * 发送短信
     */
    public function send($mobile, $code, $template, $config)
    {
        $easySms = new EasySms($config);

        $easySms->send($mobile, [
            'template' => $template,
            'data' => [
                'code' => $code,
            ],
        ]);
        return true;
    }

    /**
     * @param $mobile
     * @param $code
     * @param string $template
     * @param array $config
     */
    public function realSend($mobile, $code, $template = '', $config = [])
    {
        if ($this->queueSwitch == true) {
            return SmsQueue::dispatch($mobile, $code, $template, $config);
        }

        return SmsQueue::dispatchNow($mobile, $code, $template, $config);
    }

    /**
     * 单独配置开发
     */
    public function setConfig($queueSwitch = '')
    {
        $this->queueSwitch = $queueSwitch ? : $this->queueSwitch;

        return $this;
    }
}
