<?php

namespace App\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class MobileRule 手机规则类
 * @package App\Common\Rules
 * @author kbdxbt <1194174530@qq.com>
 */
class MobileRule implements Rule
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
        return preg_match('/^[1][3456789][0-9]{9}$/', $value);
    }

    /**
     * 获取验证错误消息。
     *
     * @return string
     */
    public function message()
    {
        return ' :attribute 不正确';
    }
}
