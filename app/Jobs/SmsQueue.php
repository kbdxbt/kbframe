<?php

namespace App\Jobs;

use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class SmsQueue 短信队列类
 * @package App\Jobs
 * @author kbdxbt <1194174530@qq.com>
 */
class SmsQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** 任务可以尝试的最大次数。*/
    public $tries = 3;

    /** 服务操作对象 **/
    protected $service;

    /** 短信配置 */
    protected $config;

    /** 手机 */
    public $mobile;

    /** 验证码 */
    public $code;

    /** 模板 */
    public $template;

    /**
     * 创建任务实例
     *
     * @return void
     */
    public function __construct($mobile, $code, $template = '', $config = [])
    {
        $this->service = new SmsService();
        $this->mobile = $mobile;
        $this->code = $code;
        $this->template = $template;
        $this->config = array_merge(config('sms'), $config);
    }

    /**
     * 执行任务
     *
     * @return void
     */
    public function handle()
    {
        $this->service->send($this->mobile, $this->code, $this->template, $this->config);

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
        $errorMessage = [];
        $exceptions = $exception->getExceptions();
        $gateways = $this->config['default']['gateways'];

        foreach ($gateways as $gateway) {
            if (isset($exceptions[$gateway])) {
                $errorMessage[$gateway] = $exceptions[$gateway]->getMessage();
                // 这一块失败队列可以自己处理，方案很多
                \Log::info('sms log:.'.json_encode($errorMessage[$gateway]));
            }
        }
    }
}
