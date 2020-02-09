<?php

namespace App\Services;

use App\Jobs\MailerQueue;
use App\Jobs\SmsQueue;

/**
 * Class MailerService 邮件服务类
 * @package App\Services
 * @author kbdxbt <1194174530@qq.com>
 */
class MailerService
{
    /**
     * 队列开关
     *
     * @var bool
     */
    protected $queueSwitch = false;

    /**
     * @var array
     */
    protected $config = [];

    /**
     * 发送邮件
     * @param $email
     * @param $subject
     * @param string $template
     * @param array $data
     */
    public function send($email, $subject, $template, $data)
    {
        \Mail::send($template, $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
//            $message->from($address, $name)->to($email)->subject($subject);
        });
    }

    /**
     * @param $email
     * @param $subject
     * @param $template
     * @param $data
     */
    public function realSend($email, $subject, $template = 'mail.default', $data = [])
    {
        if ($this->queueSwitch == true) {
            return MailerQueue::dispatch($email, $subject, $template, $data);
        }

        return MailerQueue::dispatchNow($email, $subject, $template, $data);
    }

    /**
     * 单独邮件配置
     * 格式 $config['driver'] = '';
     */
    public function setConfig($queueSwitch = '', $config = [])
    {
        $this->queueSwitch = $queueSwitch ? : $this->queueSwitch;

        if (!$this->config) {
            return $this;
        }

        $config['mail'] = array_merge(config('mail'), $this->config);
        config($config);

        return $this;
    }
}
