<?php

namespace App\Repositories;

use App\Common\Enums\StatusEnum;
use App\Helpers\TreeHepler;
use App\Models\Notify;
use App\Repositories\Magics\NotifyMagic;

/**
 * Class NotifyRepository 消息仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class NotifyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $guard = [
        'title', 'content', 'type', 'target_id', 'target_type', 'target_display', 'action', 'sender_id', 'sender_display', 'sender_withdraw'
    ];

    /**
     * 按时间获取公告列表
     * @param $params
     * @param int $pageSize
     * @return mixed
     */
    public function getListByTime($lastTime)
    {
        return $this->newModel()->where(['type' => Notify::TYPE_ANNOUNCE, 'status' => StatusEnum::ENABLED])
                ->where('created_at', '>', $lastTime)
                ->get();
    }

    /**
     * 获取当前用户的所有消息
     * @param $params
     * @param int $pageSize
     * @return mixed
     */
    public function paginate($params, $pageSize = 15)
    {
        return $this
            ->with('sender')
            ->where('sender_id', user()->id)
            ->where('status', '>=', StatusEnum::ENABLED)
            ->where('type', Notify::TYPE_ANNOUNCE)
            ->orderBy('created_at', 'desc')
            ->magic((new NotifyMagic($params))->setCurrentScene('backend'))
            ->paginate($pageSize);
    }

    /**
     * 获取全部权限
     * @return mixed
     */
    public function getAllPermission()
    {
        $list = $this->newModel()->where('status', '>=', '1')
            ->orderBy('sort', 'desc')
            ->get()
            ->toArray();

        $tree = new TreeHepler();
        $data = $tree->array2tree($list, 'display_name', 'id', 'parent_id');

        return $data;
    }

    /**
     * @return Model
     */
    public function newModel()
    {
        return app(Notify::class);
    }
}
