<?php

namespace App\Repositories;

use App\Common\Enums\StatusEnum;
use App\Helpers\TreeHepler;
use App\Models\Notify;
use App\Models\NotifyRecord;
use App\Repositories\Magics\NotifyMagic;

/**
 * Class NotifyRecordRepository 消息记录仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class NotifyRecordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $guard = [
        'name', 'guard_name', 'display_name', 'route', 'icon_id', 'parent_id', 'sort', 'status'
    ];

    /**
     * 获取单条消息记录
     * @param $id
     * @return mixed
     */
    public function getNotifyById($id)
    {
        return $this->from(NotifyRecord::table().' as a')
            ->join( Notify::table()." as b", 'a.notify_id', '=', 'b.id')
            ->where('a.notify_id', $id)
            ->where('a.user_id', user()->id)
            ->where('a.status', '>=', StatusEnum::ENABLED)
            ->first();
    }

    /**
     * 获取用户最新的一条公告
     * @param $params
     * @param int $pageSize
     * @return mixed
     */
    public function getLatestByUserId($user_id)
    {
        return $this->newModel()->where(['user_id' => $user_id, 'type' => Notify::TYPE_ANNOUNCE])
            ->orderBy('id', 'desc')
            ->first();
    }

    /**
     * 获取当前用户的所有消息
     * @param $params
     * @param int $pageSize
     * @return mixed
     */
    public function paginate($params, $pageSize = 15)
    {
        return $this->from(NotifyRecord::table().' as a')
            ->select(['a.*','b.title'])
            ->join( Notify::table()." as b", 'a.notify_id', '=', 'b.id')
            ->where('a.user_id', user()->id)
            ->where('a.status', '>=', StatusEnum::ENABLED)
            ->where('b.status', '>=', StatusEnum::ENABLED)
            ->orderBy('a.created_at', 'desc')
            ->magic((new NotifyMagic($params))->setCurrentScene('backend'))
            ->paginate($pageSize);
    }

    /**
     * 设置已读
     * @param $id
     * @return mixed
     */
    public function setRead($ids, $attr = 'id')
    {
        return $this->whereIn($attr, $ids)->update(['is_read'=>'1']);
    }

    /**
     * @return Model
     */
    public function newModel()
    {
        return app(NotifyRecord::class);
    }
}
