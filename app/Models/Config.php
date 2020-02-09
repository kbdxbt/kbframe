<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Config 配置模型类
 * @package App\Models
 * @author kbdxbt <1194174530@qq.com>
 */
class Config extends BaseModel
{
    public static $configMap = [
        '1' => '网站配置',
        '2' => '参数配置',
    ];

    public $timestamps = true;
}
