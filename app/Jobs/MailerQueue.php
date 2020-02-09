<?php

namespace App\Jobs;

use App\Services\MailerService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * 发送邮件队列
 * Class MailerQueue
 * @package App\Jobs
 * @author kbdxbt <1194174530@qq.com>
 */
class MailerQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** 任务可以尝试的最大次数。*/
    public $tries = 3;

    /** 服务操作对象 **/
    protected $service;

    /** 邮件配置 */
    protected $config;

    /** 邮箱 */
    public $email;

    /** 主题(标题) */
    public $subject;

    /** 邮件模板 */
    public $template;

    /** 邮件data */
    protected $data;

    /** 邮件来源地址 */
//    protected $address;

    /** 邮件来源名称 */
//    protected $name;

    // 如需使用更多的邮件内容操作,请参看 Illuminate\Mail\Mailable 添加即可

    /**
     * 创建任务实例
     *
     * @return void
     */
    public function __construct($email, $subject, $template = 'mail.default', $data = [], $config = [])
    {
        $this->service = new MailerService();
        $this->email = $email;
        $this->subject = $subject;
        $this->template = $template;
        $this->data = $data;
        $this->config = $config;
    }

    /**
     * 执行任务
     *
     * @return void
     */
    public function handle()
    {
        $this->service->setConfig($this->config)->send($this->email, $this->subject, $this->template, $this->data);

        return true;
    }

    /**
     * 任务失败的记录日志
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(\Exception $exception)
    {
        // 这一块失败队列可以自己处理，方案很多
        \Log::info('mail log:.'.json_encode($exception->getMessage()));
    }
}
