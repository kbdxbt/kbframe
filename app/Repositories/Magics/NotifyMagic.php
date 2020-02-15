<?php

namespace App\Repositories\Magics;

use Kbdxbt\LaravelRepository\Contracts\QueryRelate;

/**
 * Class NotifyMagic 消息查询类
 * @package App\Repositories\Magics
 * @author kbdxbt <1194174530@qq.com>
 */
class NotifyMagic extends BaseMagic
{
    /**
     * @var array
     * 按场景查询条件约束
     */
    protected $scenes = [
        'backend' => ['id', 'title', 'status'],
    ];

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byTitle(QueryRelate $queryRelate, $title)
    {
        return $queryRelate->where('title', 'like', "%{$title}%");
    }
}
