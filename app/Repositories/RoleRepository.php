<?php

namespace App\Repositories;

use App\Common\Enums\StatusEnum;
use App\Models\Role;
use App\Models\User;

/**
 * Class RolesRepository 角色仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $guard = [
        'name', 'guard_name', 'display_name', 'sort', 'status'
    ];

    /**
     * 获取全部权限
     * @return mixed
     */
    public function getRoles()
    {
        return Role::where('status', '>=', StatusEnum::DISABLED)
            ->orderBy('sort','desc')
            ->get();
    }

    /**
     * 获取角色id下面的所有用户id
     * @return mixed
     */
    public function getUserById($roleId)
    {
        return User::role($roleId)->get();
    }

    /**
     * 获取用户下面的所有角色
     * @return mixed
     */
    public function getRoleByUserId($userId)
    {
        return User::role($userId)->get();
    }

    /**
     * @return Model
     */
    public function newModel()
    {
        return app(Role::class);
    }
}
