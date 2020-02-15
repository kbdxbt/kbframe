<?php

namespace App\Common\Enums;

/**
 * Class StorageEnum 存储枚举
 * @package App\Common\Enums
 * @author jianyan74 <751393839@qq.com>
 */
class StorageEnum
{
    const DRIVE_LOCAL = 'local';
    const DRIVE_QINIU = 'qiniu';
    const DRIVE_OSS = 'oss';
    const DRIVE_OSS_JS = 'oss-js';
    const DRIVE_COS = 'cos';

    /**
     * @var array
     */
    public static $driveExplain = [
        self::DRIVE_LOCAL => '本地',
        self::DRIVE_QINIU => '七牛',
        self::DRIVE_OSS => 'OSS',
        self::DRIVE_COS => 'COS',
    ];
}
