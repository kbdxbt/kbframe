<?php

namespace App\Repositories;

use App\Common\Enums\StatusEnum;
use App\Helpers\TreeHepler;
use App\Models\Permission;

/**
 * Class PermissionRepository 权限仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $guard = [
        'name', 'guard_name', 'display_name', 'route', 'icon_id', 'parent_id', 'sort', 'status'
    ];

    /**
     * 获取全部权限
     * @return mixed
     */
    public function getAllPermission()
    {
        $list = $this->newModel()->where('status', '>=', StatusEnum::ENABLED)
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
        return app(Permission::class);
    }
}
