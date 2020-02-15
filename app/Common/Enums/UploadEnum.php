<?php

namespace App\Common\Enums;

/**
 * Class UploadEnum 上传枚举
 * @package App\Common\Enums
 * @author jianyan74 <751393839@qq.com>
 */
class UploadEnum
{
    const UPLOAD_TYPE_IMAGES = 'images';
    const UPLOAD_TYPE_FILES = 'files';
    const UPLOAD_TYPE_VIDEOS = 'videos';
    const UPLOAD_TYPE_VOICES = 'voices';

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::UPLOAD_TYPE_IMAGES => '图片',
            self::UPLOAD_TYPE_FILES => '文件',
            self::UPLOAD_TYPE_VIDEOS => '视频',
            self::UPLOAD_TYPE_VOICES => '音频',
        ];
    }

}
