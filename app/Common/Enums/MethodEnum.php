<?php

namespace App\Common\Enums;

/**
 * Class MethodEnum 方法枚举
 * @package common\enums
 * @author jianyan74 <751393839@qq.com>
 */
class MethodEnum extends BaseEnum
{
    const POST = 'POST';
    const GET = 'GET';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
    const ALL = '*';

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::ALL => '不限',
            self::POST => 'Post',
            self::GET => 'Get',
            self::PUT => 'Put',
            self::DELETE => 'Delete',
        ];
    }
}
