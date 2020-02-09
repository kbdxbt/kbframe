<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'system.user',
                'guard_name' => 'backend',
                'display_name' => '用户权限',
                'route' => 'system.user',
                'icon_id' => 10,
                'parent_id' => 0,
                'sort' => 999,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-12-18 07:56:01',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'backend.user',
                'guard_name' => 'backend',
                'display_name' => '用户管理',
                'route' => 'backend.user',
                'icon_id' => 83,
                'parent_id' => 1,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-12-14 07:18:36',
                'status' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'backend.user.create',
                'guard_name' => 'backend',
                'display_name' => '添加用户',
                'route' => 'backend.user.create',
                'icon_id' => 1,
                'parent_id' => 2,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'backend.user.edit',
                'guard_name' => 'backend',
                'display_name' => '编辑用户',
                'route' => 'backend.user.edit',
                'icon_id' => 1,
                'parent_id' => 2,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'backend.user.destroy',
                'guard_name' => 'backend',
                'display_name' => '删除用户',
                'route' => 'backend.user.destroy',
                'icon_id' => 1,
                'parent_id' => 2,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'backend.role',
                'guard_name' => 'backend',
                'display_name' => '角色管理',
                'route' => 'backend.role',
                'icon_id' => 121,
                'parent_id' => 1,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'backend.role.create',
                'guard_name' => 'backend',
                'display_name' => '添加角色',
                'route' => 'backend.role.create',
                'icon_id' => 1,
                'parent_id' => 8,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'backend.role.edit',
                'guard_name' => 'backend',
                'display_name' => '编辑角色',
                'route' => 'backend.role.edit',
                'icon_id' => 1,
                'parent_id' => 8,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'backend.role.destroy',
                'guard_name' => 'backend',
                'display_name' => '删除角色',
                'route' => 'backend.role.destroy',
                'icon_id' => 1,
                'parent_id' => 8,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'backend.role.permission',
                'guard_name' => 'backend',
                'display_name' => '分配权限',
                'route' => 'backend.user.permission',
                'icon_id' => 1,
                'parent_id' => 8,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'backend.permission',
                'guard_name' => 'backend',
                'display_name' => '权限管理',
                'route' => 'backend.permission',
                'icon_id' => 12,
                'parent_id' => 1,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            11 => 
            array (
                'id' => 14,
                'name' => 'backend.permission.create',
                'guard_name' => 'backend',
                'display_name' => '添加权限',
                'route' => 'backend.permission.create',
                'icon_id' => 1,
                'parent_id' => 13,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            12 => 
            array (
                'id' => 15,
                'name' => 'backend.permission.edit',
                'guard_name' => 'backend',
                'display_name' => '编辑权限',
                'route' => 'backend.permission.edit',
                'icon_id' => 1,
                'parent_id' => 13,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            13 => 
            array (
                'id' => 16,
                'name' => 'backend.permission.destroy',
                'guard_name' => 'backend',
                'display_name' => '删除权限',
                'route' => 'backend.permission.destroy',
                'icon_id' => 1,
                'parent_id' => 13,
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-11-21 15:23:06',
                'status' => 1,
            ),
            14 => 
            array (
                'id' => 55,
                'name' => 'system.manage',
                'guard_name' => 'backend',
                'display_name' => '系统管理',
                'route' => NULL,
                'icon_id' => 30,
                'parent_id' => 0,
                'sort' => 3,
                'created_at' => '2019-12-18 09:21:31',
                'updated_at' => '2019-12-18 09:21:45',
                'status' => 1,
            ),
            15 => 
            array (
                'id' => 56,
                'name' => 'config.index',
                'guard_name' => 'backend',
                'display_name' => '配置管理',
                'route' => 'backend.config',
                'icon_id' => 29,
                'parent_id' => 55,
                'sort' => NULL,
                'created_at' => '2019-12-18 10:06:17',
                'updated_at' => '2019-12-18 10:06:30',
                'status' => 1,
            ),
            16 => 
            array (
                'id' => 57,
                'name' => 'system.notify',
                'guard_name' => 'backend',
                'display_name' => '消息管理',
                'route' => 'backend.notify',
                'icon_id' => 91,
                'parent_id' => 55,
                'sort' => NULL,
                'created_at' => '2020-01-02 07:08:02',
                'updated_at' => '2020-01-02 12:44:14',
                'status' => 1,
            ),
            17 => 
            array (
                'id' => 58,
                'name' => 'system.announce',
                'guard_name' => 'backend',
                'display_name' => '公告管理',
                'route' => 'backend.announce',
                'icon_id' => 93,
                'parent_id' => 55,
                'sort' => NULL,
                'created_at' => '2020-01-02 12:45:16',
                'updated_at' => '2020-01-03 07:27:20',
                'status' => 1,
            ),
            18 => 
            array (
                'id' => 59,
                'name' => 'backend.log.action',
                'guard_name' => 'backend',
                'display_name' => '行为日志',
                'route' => 'backend.log.action',
                'icon_id' => 129,
                'parent_id' => 55,
                'sort' => NULL,
                'created_at' => '2020-01-30 04:48:13',
                'updated_at' => '2020-01-30 04:48:13',
                'status' => 1,
            ),
        ));
        
        
    }
}