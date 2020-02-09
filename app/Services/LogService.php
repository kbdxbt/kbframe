<?php

namespace App\Services;

use App\Jobs\LogQueue;
use Illuminate\Support\Facades\DB;

/**
 * Class LogService 日志服务类
 * @package App\Services
 * @author kbdxbt <1194174530@qq.com>
 */
class LogService
{
    /**
     * 队列开关
     *
     * @var bool
     */
    protected $queueSwitch = false;

    /**
     * 操作的数据库
     */
    protected $db = 'mysql';

    /**
     * 操作query
     */
    protected $query;

    /**
     * 操作日志
     * @param $params
     */
    public function saveActionLog($db, $params)
    {
        $this->setDb($db)->setQuery('action_log');

        $this->query->insert([
            'app' => $params['app'] ?? 'backend',
            'user_id' => user()->id ?? 0,
            'username' => $params['username'] ?? user()->username,
            'type' => request()->method(),
            'group' => $params['group'],
            'level' => $params['level'],
            'url' => request()->url(),
            'params' => $params['params'],
            'remark' => $params['remark'],
            'status' => $params['status'],
            'ip' => request()->getClientIp(),
            'created_at' => date('Y-m-d H:i:s', time()),
        ]);
    }

    /**
     * 数据库执行日志
     * @param $params
     */
    public function saveDbLog($db, $params)
    {
        if ($db == 'mysql') {
            return;
        }

        $this->setDb($db)->setQuery('db_log');

        $this->query->insert([
            'app' => $params['app'] ?? 'backend',
            'type' => $params['type'],
            'url' => request()->url(),
            'method' => request()->method(),
            'query' => $params['query'],
            'time' => $params['time'],
            'created_at' => date('Y-m-d H:i:s', time()),
        ]);
    }

    /**
     * 请求日志
     * @param $params
     */
    public function saveReqLog($db, $params)
    {
        $this->setDb($db)->setQuery('req_log');

        $this->query->insert([
            'app' => $params['app'] ?? 'backend',
            'user_id' => user()->id ?? 0,
            'method' => request()->method(),
            'route' => request()->route()->getName(),
            'action' => request()->route()->getActionMethod(),
            'url' => request()->server('HTTP_HOST'),
            'path' => request()->path(),
            'res_data' => json_encode(request()->all()),
            'header_data' => json_encode(request()->header()),
            'ip' => request()->getClientIp(),
            'http_code' => request()->server('REDIRECT_STATUS'),
            'port' => request()->getPort(),
            'format_type' => request()->format(),
            'error_code' => '',
            'error_data' => '',
            'device' => '',
            'version' => '',
            'created_at' => date('Y-m-d H:i:s', time()),
        ]);
    }

    /**
     * @param $email
     * @param $subject
     * @param $template
     * @param $data
     */
    public function realSave($type, $params = [])
    {
        if ($this->queueSwitch == true) {
            return LogQueue::dispatch($type, $this->db, $params);
        }

        return LogQueue::dispatchNow($type, $this->db, $params);
    }


    /**
     * @param string $queueSwitch
     * @param string $db
     * @return $this
     */
    public function setConfig($queueSwitch = '')
    {
        $this->queueSwitch = $queueSwitch ? : $this->queueSwitch;

        return $this;
    }

    /**
     * @param $db
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    /**
     * @param string $queueSwitch
     * @param string $db
     * @return $this
     */
    public function setQuery($name)
    {
        if ($this->db == 'mongodb') {
            $this->query = DB::connection('mongodb')->collection($name);
        } else {
            $this->query = DB::table($name);
        }

        return $this;
    }
}
