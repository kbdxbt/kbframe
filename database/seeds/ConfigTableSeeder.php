<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('config')->delete();
        
        \DB::table('config')->insert(array (
            0 => 
            array (
                'id' => 1,
                'app' => 'backend',
                'title' => 'web_site_title',
                'name' => '网站标题',
                'value' => 'kbframe',
                'group' => 1,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2020-01-13 02:02:46',
            ),
            1 => 
            array (
                'id' => 2,
                'app' => 'backend',
                'title' => 'web_logo',
                'name' => '网站logo',
                'value' => '',
                'group' => 1,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2020-01-30 04:44:15',
            ),
            2 => 
            array (
                'id' => 3,
                'app' => 'backend',
                'title' => 'web_site_describe',
                'name' => '网站描述',
                'value' => '',
                'group' => 1,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2019-12-19 07:04:46',
            ),
            3 => 
            array (
                'id' => 4,
                'app' => 'backend',
                'title' => 'web_copyright',
                'name' => '版权所有',
                'value' => '',
                'group' => 1,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2020-01-13 02:02:54',
            ),
            4 => 
            array (
                'id' => 5,
                'app' => 'backend',
                'title' => 'web_site_icp',
                'name' => '备案号',
                'value' => '',
                'group' => 1,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2020-01-14 10:31:56',
            ),
            5 => 
            array (
                'id' => 6,
                'app' => 'backend',
                'title' => 'web_visit_code',
                'name' => '站点统计',
                'value' => '',
                'group' => 1,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2019-12-19 12:53:45',
            ),
            6 => 
            array (
                'id' => 7,
                'app' => 'backend',
                'title' => 'sys_image_watermark_status',
                'name' => '水印状态',
                'value' => '',
                'group' => 2,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2019-12-19 06:59:25',
            ),
            7 => 
            array (
                'id' => 8,
                'app' => 'backend',
                'title' => 'sys_image_watermark_img',
                'name' => '图片水印',
                'value' => '',
                'group' => 2,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2019-12-19 06:59:25',
            ),
            8 => 
            array (
                'id' => 9,
                'app' => 'backend',
                'title' => 'sys_image_watermark_location',
                'name' => '水印位置',
                'value' => '',
                'group' => 2,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2019-12-19 12:54:13',
            ),
            9 => 
            array (
                'id' => 10,
                'app' => 'backend',
                'title' => 'web_test_editor',
                'name' => '测试编辑',
                'value' => '',
                'group' => 2,
                'type' => '',
                'options' => '',
                'tip' => '',
                'sort' => 0,
                'status' => 0,
                'created_at' => '2019-12-18 15:50:22',
                'updated_at' => '2020-01-30 04:44:15',
            ),
        ));
        
        
    }
}