<?php

namespace App\Helpers\Upload;

use App\Helpers\Upload\Drive\Cos;
use App\Helpers\Upload\Drive\Local;
use App\Helpers\Upload\Drive\OSS;

/**
 * Class UploadDrive
 * @package common\components
 * @author jianyan74 <751393839@qq.com>
 */
class UploadDrive
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * UploadDrive constructor.
     */
    public function __construct()
    {
//        $this->config = config('filesystems.uploadConfig.images');
    }

    /**
     * @param array $config
     * @return Local
     */
    public function local($config = [])
    {
        return new Local(array_merge($this->config, $config));
    }

    /**
     * @param array $config
     * @return OSS
     */
    public function oss($config = [])
    {
        return new OSS(array_merge($this->config, $config));
    }

    /**
     * @param array $config
     * @return Cos
     */
    public function cos($config = [])
    {
        return new Cos(array_merge($this->config, $config));
    }

    /**
     * @param array $config
     * @return Qiniu
     */
    public function qiniu($config = [])
    {
        return new Qiniu(array_merge($this->config, $config));
    }
}
