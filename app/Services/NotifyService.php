<?php

namespace App\Services;

use App\Models\Notify;
use App\Models\NotifyRecord;
use App\Repositories\NotifyRecordRepository;
use App\Repositories\NotifyRepository;

class NotifyService
{
    /**
     * 获取公告
     * @param string $user_id
     * @param string $created_at
     */
    public function pullAnnounce($user_id = '', $created_at = '')
    {
        $user_id = $user_id ? : user()->id;
        $notifyRecordRepository = new NotifyRecordRepository;
        $model = $notifyRecordRepository->getLatestByUserId($user_id);


        $lastTime = $model ? $model->created_at : $created_at;
        $notifys = app(NotifyRepository::class)->getListByTime($lastTime)->toArray();

        $rows = [];
        foreach ($notifys as $notify) {
            $rows[] = [
                'notify_id' => $notify['id'],
                'user_id' => $user_id,
                'type' => Notify::TYPE_ANNOUNCE,
                'created_at' => $notify['created_at'],
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        !empty($rows) && $notifyRecordRepository->insert($rows);
    }
}
