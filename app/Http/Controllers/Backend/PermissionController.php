<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PermissionRequest;
use App\Helpers\TreeHepler;
use App\Repositories\Magics\PermissionMagic;
use App\Repositories\PermissionRepository;

/**
 * Class PermissionController 权限控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class PermissionController extends BaseController
{
    /**
     * PermissionController constructor.
     * @param PermissionRepository $repository
     */
    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $list = $this->repository->getAllPermission();

        return $this->success($list);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->repository->findModel();
        $permissions = $this->repository->getAllPermission();

        return view('backend.permission.edit', compact('permission','permissions'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->findModel($id);
        $permissions = $this->repository->getAllPermission();

        return view('backend.permission.edit', compact('permission','permissions'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $ids = request()->input('ids');
        if (empty($ids)) {
            return $this->error('请选择删除项');
        }

        $models = $this->repository->whereIn('id', $ids)->get();
        if (count($models) != count($ids)) {
            return $this->error('删除数据异常');
        }

        foreach ($models as $model) {
            if ($model->where('parent_id',$ids[0])->first()){
                return $this->error('存在子权限禁止删除');
            }
        }

        $this->repository->whereIn('id', $ids)->delete();
        return $this->success('成功');
    }
}
