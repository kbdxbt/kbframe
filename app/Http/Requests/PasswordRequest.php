<?php

namespace App\Http\Requests;

use App\Common\Rules\PasswordRule;

/**
 * Class PasswordRequest 密码请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class PasswordRequest extends BaseRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        $rules = [
            'oldPassword' => ['required'],
            'password' => ['required', new PasswordRule],
            'rePassword' => ['required', 'same:password'],
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'oldPassword' => '旧密码',
            'password' => '新密码',
            'rePassword' => '确认密码',
        ];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * 填充数据
     * @return array
     */
    public function filldata()
    {
        parent::filldata();

        return $this->data;
    }
}
