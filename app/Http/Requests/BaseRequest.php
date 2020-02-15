<?php

namespace App\Http\Requests;

use App\Helpers\ArrayHelper;

/**
 * Class BaseRequest 基础请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class BaseRequest extends AbstractRequest
{
    protected $data = [];

    /**
     * 填充数据
     * @return array
     */
    public function filldata()
    {
        $attr = array_keys($this->attributes());
        $this->data = request()->all();
        if ($attr) {
            $this->data = ArrayHelper::filter($this->data, $attr);
        }
    }
}
