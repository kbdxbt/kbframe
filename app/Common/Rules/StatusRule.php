<?php

namespace App\Common\Rules;

use App\Common\Enums\StatusEnum;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class StatusRule 状态规则类
 * @package App\Common\Rules
 * @author kbdxbt(1194174530@qq.com)
 */
class StatusRule implements Rule
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
        return in_array($value, array_keys(StatusEnum::getMap()));
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
