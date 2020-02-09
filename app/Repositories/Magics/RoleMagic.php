<?php

namespace App\Repositories\Magics;

use Kbdxbt\LaravelRepository\Contracts\QueryRelate;

/**
 * Class RoleMagic 角色查询类
 * @package App\Repositories\Magics
 * @author kbdxbt <1194174530@qq.com>
 */
class RoleMagic extends BaseMagic
{
    /**
     * @var array
     * 按场景查询条件约束
     */
    protected $scenes = [
        'backend' => ['id', 'displayName', 'status'],
    ];

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byDisplayName(QueryRelate $queryRelate, $displayName)
    {
        return $queryRelate->where('display_name', 'like', "%{$displayName}%");
    }
}
