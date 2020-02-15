<?php

namespace App\Services;

/**
 * Class PermissionService 权限服务类
 * @package App\Services
 * @author kbdxbt <1194174530@qq.com>
 */
class PermissionService extends BaseService
{
    public function handle($permissions, $role)
    {
        // 循环处理权限功能
        foreach ($permissions as $key1 => $item1){
            $permissions[$key1]['own'] = $role->hasPermissionTo($item1['id']) ? 'checked' : false ;
            if (isset($item1['_child'])){
                foreach ($item1['_child'] as $key2 => $item2){
                    $permissions[$key1]['_child'][$key2]['own'] = $role->hasPermissionTo($item2['id']) ? 'checked' : false ;
                    if (isset($item2['_child'])){
                        foreach ($item2['_child'] as $key3 => $item3){
                            $permissions[$key1]['_child'][$key2]['_child'][$key3]['own'] = $role->hasPermissionTo($item3['id']) ? 'checked' : false ;
                        }
                    }
                }
            }
        }

        return $permissions;
    }
}
