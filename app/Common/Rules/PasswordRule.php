<?php

namespace App\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class PasswordRule 密码规则类
 * @package App\Common\Rules
 * @author kbdxbt(1194174530@qq.com)
 */
class PasswordRule implements Rule
{
    /**
     * 判断验证规则是否通过。
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z]\w{5,17}$/', $value);
    }

    /**
     * 获取验证错误消息。
     *
     * @return string
     */
    public function message()
    {
        return ' :attribute 必须以字母开头，长度在6-18之间，只能包含字符、数字和下划线';
    }
}
