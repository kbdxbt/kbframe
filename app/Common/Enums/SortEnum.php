<?php

namespace App\Common\Enums;

/**
 * Class SortEnum 排序枚举
 * @package common\enums
 * @author jianyan74 <751393839@qq.com>
 */
class SortEnum extends BaseEnum
{
    const DESC = 'desc';
    const ASC = 'asc';

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::DESC => '降序',
            self::ASC => '升序',
        ];
    }
}
