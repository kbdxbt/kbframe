<?php

namespace App\Http\Controllers\Backend;

use App\Common\Traits\BackendAction;
use App\Http\Controllers\Controller;
use App\Common\Traits\BaseResponse;
use App\Services\LogService;

/**
 * Class BaseController 基类控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class BaseController extends Controller
{
    use BaseResponse,BackendAction;
    protected $params;

    public function __construct()
    {
        $this->params = request()->all();

//        //记录请求的数据
//        app(LogService::class)->setDb('mysql')->realSave('req');
    }
}
