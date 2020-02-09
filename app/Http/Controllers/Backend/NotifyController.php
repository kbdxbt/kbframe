<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\NotifyRecordRepository;
use App\Repositories\NotifyRepository;

/**
 * Class NotifyController 消息控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class NotifyController extends BaseController
{
    /**
     * NotifyController constructor.
     * @param NotifyRepository $repository
     */
    public function __construct(NotifyRecordRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $list = $this->repository
            ->paginate($this->params, per_page())
            ->toArray();

        $list['data'] = $this->repository->newModel()->formatStatus($list['data']);

        return $this->paginate($list['data'], $list['total']);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $notify = $this->repository->getNotifyById($id);
        if (!$notify) {
            return $this->error('数据错误');
        }

        $notify->is_read == 1 ?: $this->repository->setRead([$notify->id], 'notify_id');
        return view('backend.notify.show', compact('notify'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        $ids = request()->input('ids');
        if (empty($ids)) {
            return $this->error('请选择操作项');
        }

        $models = $this->repository->whereIn('id', $ids)->get();
        if (count($models) != count($ids)) {
            return $this->error('操作数据异常');
        }

        $this->repository->setRead($ids);

        return $this->success('成功');
    }
}
