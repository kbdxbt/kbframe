<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Carbon;

/**
 * Class DingTalkQueue 钉钉队列
 * @package App\Jobs
 * @author kbdxbt <1194174530@qq.com>
 */
class DingTalkQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** 任务可以尝试的最大次数。*/
    public $tries = 3;

    /**
     * @var
     */
    private $message;
    /**
     * @var
     */
    private $code;
    /**
     * @var
     */
    private $file;
    /**
     * @var
     */
    private $line;
    /**
     * @var
     */
    private $url;
    /**
     * @var
     */
    private $trace;
    /**
     * @var
     */
    private $exception;

    /**
     * @var
     */
    private $reboot;

    /**
     * @var
     */
    private $simple;

    /**
     * Create a new job instance.
     *
     * @param $url
     * @param $exception
     * @param $message
     * @param $code
     * @param $file
     * @param $line
     * @param $trace
     * @param $simple
     */
    public function __construct($url, $exception, $message, $code, $file, $line, $trace, $reboot = '', $simple = false)
    {
        $this->message = $message;
        $this->code = $code;
        $this->file = $file;
        $this->line = $line;
        $this->url = $url;
        $this->trace =  $trace;
        $this->exception = $exception;
        $this->reboot = $reboot ?: 'default';
        $this->simple = $simple;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = [
            'Time:' . Carbon::now()->toDateTimeString(),
            'Environment:' . config('app.env'),
            'Project Name:' . config('app.name'),
            'Url:' . $this->url,
            'Exception:' . " $this->exception(code:$this->code): $this->message at $this->file:$this->line",
            $this->simple ? '' : 'Exception Trace:' . json_encode($this->trace),
        ];

        ding()->with($this->reboot)->text(implode(PHP_EOL, $message));

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
        \Log::info('dingtalk log:.'.json_encode($exception->getMessage()));
    }
}
