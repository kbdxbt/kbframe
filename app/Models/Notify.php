<?php

namespace App\Models;

/**
 * Class Notify 消息模型类
 * @package App\Models
 * @author kbdxbt <1194174530@qq.com>
 */
class Notify extends BaseModel
{
    // 消息类型
    const TYPE_ANNOUNCE = 1; //公告
    const TYPE_REMIND = 2; // 提醒
    const TYPE_MESSAGE = 3; // 私信

    // 消息类型说明
    public static $typeExplain = [
        self::TYPE_ANNOUNCE => '公告',
        self::TYPE_REMIND => '提醒',
        self::TYPE_MESSAGE => '私信',
    ];

    public $timestamps = true;

    protected $guarded = ['id'];

    /**
     * 关联发送用户
     *
     * @return \yii\db\ActiveQuery
     */
    public function sender()
    {
        return $this->hasOne('App\Models\User', 'id', 'sender_id');
    }
}
