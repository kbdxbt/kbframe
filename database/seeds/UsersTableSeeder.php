<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'root',
                'password' => '$2y$10$x5VZpcmHaRhBnNMxc725weggwWtHNCx1yiggNAIY8XdT.4fpKGkyy',
                'auth_key' => '',
                'remember_token' => 'rrFewsIFslKSVfFfOxjU3hBQpWj1u92Lm8ZEaz8KOoU7Dgv26CYN75ADOkRK',
                'type' => 1,
                'nickname' => '超级管理员',
                'realname' => '',
                'head_portrait' => 'http://www.kbframe.com/storage/images/2020/01/30/image_dOOrCQRycWedHjQ5.png',
                'gender' => 0,
                'qq' => NULL,
                'email' => 'root@dgg.net',
                'birthday' => NULL,
                'visit_count' => 30,
                'home_phone' => '',
                'mobile' => '18888888888',
                'last_time' => 1576911232,
                'last_ip' => '127.0.0.1',
                'pid' => 0,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2020-01-30 04:43:35',
            ),
        ));
        
        
    }
}