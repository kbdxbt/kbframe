<?php

namespace App\Http\Requests;

use App\Common\Rules\GenderRule;
use App\Common\Rules\MobileRule;
use App\Common\Rules\PasswordRule;
use App\Common\Rules\StatusRule;

/**
 * Class PersonRequest 个人请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class PersonRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username' => ['required', 'unique:users,username,'.user()->id, 'max:20'],
            'nickname' => ['required', 'max:20'],
            'gender' => ['required', 'numeric', new GenderRule],
            'qq' => ['nullable', 'max:20'],
            'email' => ['nullable', 'email', 'max:60'],
            'birthday' => ['nullable', 'date'],
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => '帐号',
            'password' => '密码',
            'auth_key' => '授权令牌',
            'remember_token' => 'Token令牌',
            'type' => '类别',
            'nickname' => '昵称',
            'realname' => '真实姓名',
            'head_portrait' => '头像',
            'gender' => '性别',
            'qq' => 'qq',
            'email' => '邮箱',
            'birthday' => '生日',
            'visit_count' => '访问次数',
            'home_phone' => '家庭号码',
            'mobile' => '手机号码',
            'last_time' => '最后一次登录时间',
            'last_ip' => '最后一次登录ip',
            'pid' => '上级id',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更改时间',
        ];
    }

    /**
     * 填充数据
     * @return array
     */
    public function filldata()
    {
        parent::filldata();
        unset($this->data['password']);

        return $this->data;
    }
}
