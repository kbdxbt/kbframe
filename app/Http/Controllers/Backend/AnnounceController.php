<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AnnounceRequest;
use App\Repositories\NotifyRepository;

/**
 * Class AnnounceController 公告控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class AnnounceController extends BaseController
{
    /**
     * NotifyController constructor.
     * @param NotifyRepository $repository
     */
    public function __construct(NotifyRepository $repository)
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

        return $this->paginate($list['data'], $list['total']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announce = $this->repository->findModel($id);

        return view('backend.announce.edit', compact('announce'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnounceRequest $request, $id = 0)
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
}
