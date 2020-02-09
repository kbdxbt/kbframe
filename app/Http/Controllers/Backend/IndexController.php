<?php

namespace App\Http\Controllers\Backend;

/**
 * Class IndexController
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class IndexController extends BaseController
{
    public function index()
    {
        return view('backend.layouts.layout');
    }

    public function info()
    {
        return '欢迎使用kbframe';
    }
}
