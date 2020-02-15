<?php

namespace App\Jobs;

use App\Services\LogService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class LogQueue 日志队列
 * @package App\Jobs
 * @author kbdxbt <1194174530@qq.com>
 */
class LogQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** 任务可以尝试的最大次数。*/
    public $tries = 3;

    /** 服务操作对象 **/
    protected $service;

    /** 类型 */
    protected $type;

    /** 数据库 */
    protected $db;

    /** 参数 */
    protected $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $db, $params = [])
    {
        $this->service = new LogService();
        $this->type = $type;
        $this->db = $db;
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->type == 'req') {
            $this->service->saveReqLog($this->db, $this->params);
        } elseif ($this->type == 'db') {
            $this->service->saveDbLog($this->db, $this->params);
        } elseif ($this->type == 'action') {
            $this->service->saveActionLog($this->db, $this->params);
        }
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
        \Log::info('log log:.'.json_encode($exception->getMessage()));
    }
}
