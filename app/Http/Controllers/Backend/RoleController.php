<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\TreeHepler;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Repositories\Magics\RoleMagic;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Services\PermissionService;
use App\Models\Role;

/**
 * Class RoleController 角色控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class RoleController extends BaseController
{
    /**
     * RoleController constructor.
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * 查询角色列表
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $list = $this->repository
            ->magic((new RoleMagic($this->params))->setDefaultStatus()->setCurrentScene('backend'))
            ->paginate(per_page())
            ->toArray();

        return $this->paginate($list['data'], $list['total']);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->repository->findModel($id);

        return view('backend.role.edit', compact('role'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id = 0)
    {
        $this->repository->findModel($id);

        if (!$request->validate()) {
            if ($id) {
                $this->repository->update($request->filldata(), $id);
            } else {
                $this->repository->create($request->filldata());
            }
        }

        return $this->success('成功');
    }

    /**
     * 查看权限
     */
    public function permission(PermissionService $permissionService, PermissionRepository $permissionRepository, $id)
    {
        $role = $this->repository->findModel($id);
        $permissions = $permissionRepository->getAllPermission();

        $tree = new TreeHepler();
        $permissions = $tree->list2tree($permissions, 'id', 'parent_id', $child = '_child');

        $permissions = $permissionService->handle($permissions, $role);

        return view('backend.role.permission',compact('role','permissions'));
    }

    /**
     * 分配权限
     */
    public function assignPermission($id)
    {
        $role = $this->repository->findModel($id);
        $permissions = request()->input('permissions');

        if (empty($permissions)){
            $role->permissions()->detach();
            return $this->success('更新角色权限成功');
        }

        $role->syncPermissions($permissions);

        return $this->success('更新角色权限成功');
    }
}
