<?php

namespace App\Http\Controllers\Backend;

/**
 * Class LogController 日志控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class LogController extends BaseController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function action()
    {
        return view('backend.log.action');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function actionList()
    {
        $username = $this->params['username'] ?? '';
        $list = \DB::table('action_log')
            ->when($username, function ($query, $username){
                $query->where('username', $username);
            })
            ->paginate(per_page())
            ->toArray();

        return $this->paginate($list['data'], $list['total']);
    }
}