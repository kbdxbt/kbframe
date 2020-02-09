<?php

namespace App\Models;

/**
 * Class Icon 图标模型类
 * @package App\Models
 * @author kbdxbt <1194174530@qq.com>
 */
class Icon extends BaseModel
{
    protected $fillable = ['unicode','class','name','sort'];

    //对应菜单
    public function menus()
    {
        return $this->hasMany('App\Models\Menu','icon_id','id');
    }
}
