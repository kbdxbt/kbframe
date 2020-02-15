<?php

namespace App\Common\Traits;

use Illuminate\Support\Str;

/**
 * Trait Table 数据表Trait类
 * @package App\Common\Traits
 * @author kbdxbt <1194174530@qq.com>
 */
trait Table
{
    public $timestamps = true;

    /**
     * @return mixed
     */
    public function getTable()
    {
        return Str::snake(class_basename($this));
    }

    /**
     * @return string
     */
    public static function table()
    {
        return Str::snake(class_basename(new static()));
    }
}
