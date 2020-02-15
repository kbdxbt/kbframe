<?php

/*
 *
 */

namespace App\Listeners;

use App\Services\LogService;
use Illuminate\Database\Events\QueryExecuted;

/**
 * Class QueryListener 数据库query监听
 * @package App\Listeners
 * @author kbdxbt <1194174530@qq.com>
 */
class QueryListener
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
    public function handle(QueryExecuted $event)
    {
        try{
            if (env('APP_DEBUG') == true) {

                $service = new LogService();

                $sqlWithPlaceholders = str_replace(['%', '?'], ['%%', '%s'], $event->sql);

                $bindings = $event->connection->prepareBindings($event->bindings);
                $pdo = $event->connection->getPdo();
                $realSql = vsprintf($sqlWithPlaceholders, array_map([$pdo, 'quote'], $bindings));
                $duration = $this->formatDuration($event->time / 1000);

//                $service->realSave('db', [
//                    'type' => substr($realSql, 0, stripos($realSql, ' ')),
//                    'query' => $realSql,
//                    'time' => $duration,
//                ]);

            }
        }catch (Exception $exception){
            throw $exception;
        }
    }

    // 失败处理
    public function failed()
    {
    }

    /**
     * Format duration.
     *
     * @param float $seconds
     *
     * @return string
     */
    private function formatDuration($seconds)
    {
        if ($seconds < 0.001) {
            return round($seconds * 1000000).'μs';
        } elseif ($seconds < 1) {
            return round($seconds * 1000, 2).'ms';
        }

        return round($seconds, 2).'s';
    }
}
