<?php

namespace App\Common\Traits;

/**
 * Trait BackendAction 后台Action类
 * @package App\Common\Traits
 * @author kbdxbt <1194174530@qq.com>
 */
trait BackendAction
{
    /**
     * 默认分页
     *
     * @var int
     */
    protected $pageSize = 15;

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.$this->getCurrentName()['name'].'.index');
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.$this->getCurrentName()['name'].'.edit');
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

        return $this->success('成功');
    }

    /**
     * 获取当前模块名称和控制器名称
     *
     * @return array
     */
    protected function getCurrentName()
    {
        $route = \Route::currentRouteName();
        list($module, $name) = explode('.', $route);

        return ['module' => $module, 'name' => $name];
    }


    /**
     * 解析错误
     *
     * @param $fistErrors
     * @return string
     */
    protected function analyErr($firstErrors)
    {
        if (!is_array($firstErrors) || empty($firstErrors)) {
            return false;
        }

        $errors = array_values($firstErrors)[0];
        return $errors ?? '未捕获到错误信息';
    }
}
