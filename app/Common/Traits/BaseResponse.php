<?php

namespace App\Common\Traits;

/**
 * Trait BaseResponse 响应Trait类
 * @package App\Common\Traits
 * @author kbdxbt <1194174530@qq.com>
 */
trait BaseResponse
{
    /**
     * json数据返回
     * @param $code
     * @param $message
     * @param array $data
     */
    public function jsonReturn($data = array(), $code = 0, $message = '')
    {
        $result = [
            'code' => $code,
            'msg' => $message,
            'data' => $data
        ];

        return response()->json($result);
    }

    /**
     * 成功输出json
     * @param array $data
     * @param string $message
     * @param int $code
     */
    public function success($data = array(), $message = 'ok', $code = 0)
    {
        if (request()->ajax() == false && request()->method() === 'GET') {
            return view('public.success');
        } else {
            return $this->jsonReturn($data, $code, $message);
        }
    }

    /**
     * 错误输出json
     * @param string $message
     * @param int $code
     */
    public function error($message = '', $code = -1)
    {
        if (request()->method() === 'GET') {
            return view('public.success', ['msg' => $message]);
        } else {
            return $this->jsonReturn(array(), $code, $message);
        }
    }

    /**
     * 分页输出json
     * @param string $message
     * @param int $code
     */
    public function paginate($data = array(), $total = 0, $message = 'ok', $code = 0)
    {
        $result = [
            'code' => $code,
            'msg' => $message,
            'count' => $total,
            'data' => $data
        ];

        return response()->json($result);
    }
}
