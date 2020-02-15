<?php

namespace App\Helpers\Upload\Drive;

use Yii;
use App\Helpers\RegularHelper;

/**
 * Class Local
 * @package common\components\uploaddrive
 * @author jianyan74 <751393839@qq.com>
 */
class Local extends DriveInterface
{
    /**
     * @param $baseInfo
     * @param $fullPath
     * @return mixed
     */
    protected function baseUrl($baseInfo, $fullPath)
    {
        $baseInfo['url'] = config("filesystems.disks.public.url") . '/' . $baseInfo['url'];
        if ($fullPath == true && !RegularHelper::verify('url', $baseInfo['url'])) {
            $baseInfo['url'] = env('APP_URL')  . '/' . $baseInfo['url'];
        }

        return $baseInfo;
    }

    /**
     * 初始化
     */
    protected function create()
    {
        $rootPath = config("filesystems.disks.public.root");
        // 判断是否追加
        if (isset($this->config['superaddition']) && $this->config['superaddition'] === true) {
            $this->adapter = new \League\Flysystem\Adapter\Local($rootPath, FILE_APPEND);
        } else {
            $this->adapter = new \League\Flysystem\Adapter\Local($rootPath);
        }
    }
}
