<?php

namespace App\Repositories\Magics;

use Kbdxbt\LaravelRepository\Contracts\QueryRelate;

/**
 * Class ConfigMagic 配置查询类
 * @package App\Repositories\Magics
 * @author kbdxbt <1194174530@qq.com>
 */
class ConfigMagic extends BaseMagic
{
    /**
     * @var array
     * 按场景查询条件约束
     */
    protected $scenes = [
        'backend' => ['id', 'app', 'title', 'name', 'group', 'type'],
    ];

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byApp(QueryRelate $queryRelate, $app)
    {
        return $queryRelate->where('app', '=', "{$app}");
    }

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byTitle(QueryRelate $queryRelate, $title)
    {
        return $queryRelate->whereIn('title', $title);
    }

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byName(QueryRelate $queryRelate, $name)
    {
        return $queryRelate->where('name', 'like', "%{$name}%");
    }

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byGroup(QueryRelate $queryRelate, $group)
    {
        return $queryRelate->where('group', '=', "{$group}");
    }

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byType(QueryRelate $queryRelate, $type)
    {
        return $queryRelate->where('type', '=', "{$type}");
    }
}
