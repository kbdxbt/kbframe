<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\IconRepository;

/**
 * Class IconController 图标控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class IconController extends BaseController
{
    /**
     * IconController constructor.
     * @param IconRepository $repository
     */
    public function __construct(IconRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $list = $this->repository->get()->toArray();

        return $this->success($list);
    }
}
