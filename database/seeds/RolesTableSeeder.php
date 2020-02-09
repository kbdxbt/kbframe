<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'root',
                'guard_name' => 'backend',
                'display_name' => '超级管理员',
                'sort' => 1,
                'status' => 1,
                'created_at' => '2019-11-21 15:23:06',
                'updated_at' => '2019-12-11 02:58:16',
            ),
        ));
        
        
    }
}