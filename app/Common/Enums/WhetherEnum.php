<?php

namespace App\Common\Enums;

/**
 * Class WhetherEnum 判断枚举
 * @package App\Common\Enums
 * @author jianyan74 <751393839@qq.com>
 */
class WhetherEnum extends BaseEnum
{
    const ENABLED = 1;
    const DISABLED = 0;

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::ENABLED => '是',
            self::DISABLED => '否',
        ];
    }
}
