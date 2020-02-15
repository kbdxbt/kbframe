<?php

namespace App\Http\Requests;

/**
 * Class RoleRequest 角色请求类
 * @package App\Http\Requests
 * @author kbdxbt <1194174530@qq.com>
 */
class RoleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'unique:roles,name,'.request()->id, 'max:20'],
            'display_name' => ['required', 'max:20'],
            'sort' => ['nullable', 'integer'],
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '角色标识',
            'guard_name' => '角色组',
            'display_name' => '角色名称',
            'sort' => '排序',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更改时间'
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
