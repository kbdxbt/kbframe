<?php

namespace App\Http\Controllers\Backend;

use App\Common\Enums\UploadEnum;
use App\Common\Exports\UsersImport;
use App\Helpers\UploadHelper;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PersonRequest;
use App\Repositories\Magics\UserMagic;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

/**
 * 用户管理类
 * Class UserController
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class UserController extends BaseController
{
    /**
     * @param AdminsService $adminsService
     * @param RolesRepository $rolesRepository
     */
    public function __construct(UserRepository $repository, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        parent::__construct();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getRoles();

        return view('backend.user.index', compact('roles'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        // 处理对应role下的用户id
        if ($role = request()->input('role')) {
            $data = $this->roleRepository->getUserById($role);
            $ids = $data->pluck('id')->toArray() ? : -1;
            $this->params = array_merge($this->params, ['id' => $ids]);
        }

        $list = $this->repository
            ->magic((new UserMagic($this->params))->setDefaultStatus()->setCurrentScene('backend'))
            ->paginate(request()->get('limit', $this->pageSize))
            ->toArray();

        return $this->paginate($list['data'], $list['total']);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->getRoles();
        $user = $this->repository->findModel();
        $roleVal = '';

        return view('backend.user.edit', compact('user', 'roles', 'roleVal'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(UserRequest $request, \Kbdxbt\ElasticSearchQuery\Builder $builder)
    public function store(UserRequest $request)
    {
        $currentScene = 'backendCreate';

        if (!$request->scene($currentScene)->validate()) {
            DB::beginTransaction();
            try {
                $user_roles = explode(',', $request->input('roles'));
                $user = $this->repository->create($request->scene($currentScene)->filldata());
//                //ES同步执行操作
//                $client = $builder->index('test')->type('user');
//                $client->create($user->toArray());

                !empty($user_roles) && $user->syncRoles($user_roles);
                DB::commit();
            } catch (\Exception $e) {dd($e);
                throw $e;
                DB::rollBack();
            }
        }

        return $this->success('操作成功');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->findModel($id);
        $roles = $this->roleRepository->getRoles();

        $data = $user->roles()->get();
        $roleVal = $data->implode('id', ',');

        return view('backend.user.edit', compact('user', 'roles', 'roleVal'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(UserRequest $request, \Kbdxbt\ElasticSearchQuery\Builder $builder, $id)
    public function update(UserRequest $request, $id)
    {
        $currentScene = 'backendUpdate';
        $user = $this->repository->findModel($id);
        if ($user->id == null) {
            return $this->error('用户不存在');
        }

        if (!$request->scene($currentScene)->validate()) {
            DB::beginTransaction();
            try {
                $roles = $user->roles()->pluck('id')->toArray();
                $user_roles = explode(',', $request->input('roles'));

                //判断两个数组是否一致
                if (array_diff($roles, $user_roles) || array_diff($user_roles, $roles)) {
                    $user->syncRoles($user_roles);
                }

                $user = $this->repository->update($request->scene($currentScene)->filldata(), $id);
//                //ES同步执行操作
//                $client = $builder->index('test')->type('user');
//                $client->update($id, $user->toArray());

                DB::commit();
            } catch (\Exception $e) {
                throw $e;
                DB::rollBack();
            }

            return $this->success('成功');
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function esList(\Kbdxbt\ElasticSearchQuery\Builder $builder)
    {
        //ES查询操作
        $client = $builder->index('zehui-es')->type('user');

        // 处理对应role下的用户id
        if ($role = request()->input('role')) {
            $data = $this->roleRepository->getUserById($role);
            $ids = $data->pluck('id')->toArray() ? : [-1];
            $this->params = array_merge($this->params, ['id' => $ids]);

            if (!empty($this->params['id'])) {
                $client->whereIn('id', $this->params['id']);
            }
        }

        if ($this->params['username']) {
            $client->whereMatch('username', $this->params['username']);
        }
        if ($this->params['mobile']) {
            $client->whereTerm('mobile', $this->params['mobile']);
        }

        $count = $client->count();

        $list = $client->orderBy('id', 'asc')->paginate(request()->get('page', 1), request()->get('limit', $this->pageSize))
            ->toArray();

        return $this->paginate($list['data'], $count);
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

        $this->repository->whereIn('id', $ids)->update(['status'=>'-1']);

//        //ES同步执行操作
//        $builder = app(\Kbdxbt\ElasticSearchQuery\Builder::class);
//        $client = $builder->index('test')->type('user');
//        if (is_array($ids)) {
//            foreach ($ids as $id) {
//                $client->delete($id);
//            }
//        } else {
//            $client->delete($ids);
//        }

        return $this->success('成功');
    }

    /**
     * 修改密码
     */
    public function password(PasswordRequest $request)
    {
        if ($request->method() == 'POST') {
            if (!$request->validate()) {
                $data = $request->filldata();

                if (!\Hash::check($data['oldPassword'], user()->password)) {
                    return $this->error('密码不正确');
                }

                user()->where('id', user()->id)->update(['password'=>bcrypt($data['password'])]);
                return $this->success('成功');
            }
        } else {
            return view('backend.user.password');
        }
    }

    /**
     * 修改个人信息
     */
    public function personal(PersonRequest $request)
    {
        if ($request->method() == 'POST') {
            if (!$request->validate()) {
                $user = $this->repository->update($request->filldata(), user()->id);
                return $this->success('成功');
            }
        } else {
            $user = user();
            return view('backend.user.personal', compact('user'));
        }
    }

    /**
     * 导出数据
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return (new \App\Common\Exports\UsersExport())->download('users_'.date('Y-m-d H:i:s').'.csv');
    }

    /**
     * 导出数据
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function import()
    {
        // 先上传保存文件
        $upload = new UploadHelper(request()->file(), UploadEnum::UPLOAD_TYPE_FILES);
        $upload->verifyFile();
        $upload->save();

        Excel::import(new UsersImport(), $upload->getBaseInfo()['path']);

        return $this->success('成功');
    }
}
