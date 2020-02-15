<?php

namespace App\Http\Requests;

/**
 * Class PermissionRequest 权限请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class PermissionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:permissions,name,'.request()->id, 'max:200'],
            'display_name'  => ['required']
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '权限标识',
            'guard_name' => '权限组',
            'display_name' => '权限名称',
            'route' => '路由名称',
            'icon_id' => '图标ID',
            'parent_id' => '上一级id',
            'sort' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更改时间',
            'status' => '状态'
        ];
    }

    /**
     * 填充数据
     * @return array
     */
    public function filldata()
    {
        parent::filldata();

        return $this->data;
    }
}
