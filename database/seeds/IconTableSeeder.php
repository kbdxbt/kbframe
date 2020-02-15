<?php

use Illuminate\Database\Seeder;

class IconTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('icon')->delete();
        
        \DB::table('icon')->insert(array (
            0 => 
            array (
                'id' => 1,
                'unicode' => '&#xe6c9;',
                'class' => 'layui-icon-rate-half',
                'name' => '半星',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            1 => 
            array (
                'id' => 2,
                'unicode' => '&#xe67b;',
                'class' => 'layui-icon-rate',
                'name' => '星星-空心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            2 => 
            array (
                'id' => 3,
                'unicode' => '&#xe67a;',
                'class' => 'layui-icon-rate-solid',
                'name' => '星星-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            3 => 
            array (
                'id' => 4,
                'unicode' => '&#xe678;',
                'class' => 'layui-icon-cellphone',
                'name' => '手机',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            4 => 
            array (
                'id' => 5,
                'unicode' => '&#xe679;',
                'class' => 'layui-icon-vercode',
                'name' => '验证码',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            5 => 
            array (
                'id' => 6,
                'unicode' => '&#xe677;',
                'class' => 'layui-icon-login-wechat',
                'name' => '微信',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            6 => 
            array (
                'id' => 7,
                'unicode' => '&#xe676;',
                'class' => 'layui-icon-login-qq',
                'name' => 'QQ',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            7 => 
            array (
                'id' => 8,
                'unicode' => '&#xe675;',
                'class' => 'layui-icon-login-weibo',
                'name' => '微博',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            8 => 
            array (
                'id' => 9,
                'unicode' => '&#xe673;',
                'class' => 'layui-icon-password',
                'name' => '密码',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            9 => 
            array (
                'id' => 10,
                'unicode' => '&#xe66f;',
                'class' => 'layui-icon-username',
                'name' => '用户名',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            10 => 
            array (
                'id' => 11,
                'unicode' => '&#xe9aa;',
                'class' => 'layui-icon-refresh-3',
                'name' => '刷新-粗',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            11 => 
            array (
                'id' => 12,
                'unicode' => '&#xe672;',
                'class' => 'layui-icon-auz',
                'name' => '授权',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            12 => 
            array (
                'id' => 13,
                'unicode' => '&#xe66b;',
                'class' => 'layui-icon-spread-left',
                'name' => '左向右伸缩菜单',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            13 => 
            array (
                'id' => 14,
                'unicode' => '&#xe668;',
                'class' => 'layui-icon-shrink-right',
                'name' => '右向左伸缩菜单',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            14 => 
            array (
                'id' => 15,
                'unicode' => '&#xe6b1;',
                'class' => 'layui-icon-snowflake',
                'name' => '雪花',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            15 => 
            array (
                'id' => 16,
                'unicode' => '&#xe702;',
                'class' => 'layui-icon-tips',
                'name' => '提示说明',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            16 => 
            array (
                'id' => 17,
                'unicode' => '&#xe66e;',
                'class' => 'layui-icon-note',
                'name' => '便签',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            17 => 
            array (
                'id' => 18,
                'unicode' => '&#xe68e;',
                'class' => 'layui-icon-home',
                'name' => '主页',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            18 => 
            array (
                'id' => 19,
                'unicode' => '&#xe674;',
                'class' => 'layui-icon-senior',
                'name' => '高级',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            19 => 
            array (
                'id' => 20,
                'unicode' => '&#xe669;',
                'class' => 'layui-icon-refresh',
                'name' => '刷新',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            20 => 
            array (
                'id' => 21,
                'unicode' => '&#xe666;',
                'class' => 'layui-icon-refresh-1',
                'name' => '刷新',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            21 => 
            array (
                'id' => 22,
                'unicode' => '&#xe66c;',
                'class' => 'layui-icon-flag',
                'name' => '旗帜',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            22 => 
            array (
                'id' => 23,
                'unicode' => '&#xe66a;',
                'class' => 'layui-icon-theme',
                'name' => '主题',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            23 => 
            array (
                'id' => 24,
                'unicode' => '&#xe667;',
                'class' => 'layui-icon-notice',
                'name' => '消息-通知',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            24 => 
            array (
                'id' => 25,
                'unicode' => '&#xe7ae;',
                'class' => 'layui-icon-website',
                'name' => '网站',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            25 => 
            array (
                'id' => 26,
                'unicode' => '&#xe665;',
                'class' => 'layui-icon-console',
                'name' => '控制台',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            26 => 
            array (
                'id' => 27,
                'unicode' => '&#xe664;',
                'class' => 'layui-icon-face-surprised',
                'name' => '表情-惊讶',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            27 => 
            array (
                'id' => 28,
                'unicode' => '&#xe716;',
                'class' => 'layui-icon-set',
                'name' => '设置-空心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            28 => 
            array (
                'id' => 29,
                'unicode' => '&#xe656;',
                'class' => 'layui-icon-template-1',
                'name' => '模板',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            29 => 
            array (
                'id' => 30,
                'unicode' => '&#xe653;',
                'class' => 'layui-icon-app',
                'name' => '应用',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            30 => 
            array (
                'id' => 31,
                'unicode' => '&#xe663;',
                'class' => 'layui-icon-template',
                'name' => '模板',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            31 => 
            array (
                'id' => 32,
                'unicode' => '&#xe6c6;',
                'class' => 'layui-icon-praise',
                'name' => '赞',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            32 => 
            array (
                'id' => 33,
                'unicode' => '&#xe6c5;',
                'class' => 'layui-icon-tread',
                'name' => '踩',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            33 => 
            array (
                'id' => 34,
                'unicode' => '&#xe662;',
                'class' => 'layui-icon-male',
                'name' => '男',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            34 => 
            array (
                'id' => 35,
                'unicode' => '&#xe661;',
                'class' => 'layui-icon-female',
                'name' => '女',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            35 => 
            array (
                'id' => 36,
                'unicode' => '&#xe660;',
                'class' => 'layui-icon-camera',
                'name' => '相机-空心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            36 => 
            array (
                'id' => 37,
                'unicode' => '&#xe65d;',
                'class' => 'layui-icon-camera-fill',
                'name' => '相机-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            37 => 
            array (
                'id' => 38,
                'unicode' => '&#xe65f;',
                'class' => 'layui-icon-more',
                'name' => '菜单-水平',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            38 => 
            array (
                'id' => 39,
                'unicode' => '&#xe671;',
                'class' => 'layui-icon-more-vertical',
                'name' => '菜单-垂直',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            39 => 
            array (
                'id' => 40,
                'unicode' => '&#xe65e;',
                'class' => 'layui-icon-rmb',
                'name' => '金额-人民币',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            40 => 
            array (
                'id' => 41,
                'unicode' => '&#xe659;',
                'class' => 'layui-icon-dollar',
                'name' => '金额-美元',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            41 => 
            array (
                'id' => 42,
                'unicode' => '&#xe735;',
                'class' => 'layui-icon-diamond',
                'name' => '钻石-等级',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            42 => 
            array (
                'id' => 43,
                'unicode' => '&#xe756;',
                'class' => 'layui-icon-fire',
                'name' => '火',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            43 => 
            array (
                'id' => 44,
                'unicode' => '&#xe65c;',
                'class' => 'layui-icon-return',
                'name' => '返回',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            44 => 
            array (
                'id' => 45,
                'unicode' => '&#xe715;',
                'class' => 'layui-icon-location',
                'name' => '位置-地图',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            45 => 
            array (
                'id' => 46,
                'unicode' => '&#xe705;',
                'class' => 'layui-icon-read',
                'name' => '办公-阅读',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            46 => 
            array (
                'id' => 47,
                'unicode' => '&#xe6b2;',
                'class' => 'layui-icon-survey',
                'name' => '调查',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            47 => 
            array (
                'id' => 48,
                'unicode' => '&#xe6af;',
                'class' => 'layui-icon-face-smile',
                'name' => '表情-微笑',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            48 => 
            array (
                'id' => 49,
                'unicode' => '&#xe69c;',
                'class' => 'layui-icon-face-cry',
                'name' => '表情-哭泣',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            49 => 
            array (
                'id' => 50,
                'unicode' => '&#xe698;',
                'class' => 'layui-icon-cart-simple',
                'name' => '购物车',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            50 => 
            array (
                'id' => 51,
                'unicode' => '&#xe657;',
                'class' => 'layui-icon-cart',
                'name' => '购物车',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            51 => 
            array (
                'id' => 52,
                'unicode' => '&#xe65b;',
                'class' => 'layui-icon-next',
                'name' => '下一页',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            52 => 
            array (
                'id' => 53,
                'unicode' => '&#xe65a;',
                'class' => 'layui-icon-prev',
                'name' => '上一页',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            53 => 
            array (
                'id' => 54,
                'unicode' => '&#xe681;',
                'class' => 'layui-icon-upload-drag',
                'name' => '上传-空心-拖拽',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            54 => 
            array (
                'id' => 55,
                'unicode' => '&#xe67c;',
                'class' => 'layui-icon-upload',
                'name' => '上传-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            55 => 
            array (
                'id' => 56,
                'unicode' => '&#xe601;',
                'class' => 'layui-icon-download-circle',
                'name' => '下载-圆圈',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            56 => 
            array (
                'id' => 57,
                'unicode' => '&#xe857;',
                'class' => 'layui-icon-component',
                'name' => '组件',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            57 => 
            array (
                'id' => 58,
                'unicode' => '&#xe655;',
                'class' => 'layui-icon-file-b',
                'name' => '文件-粗',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            58 => 
            array (
                'id' => 59,
                'unicode' => '&#xe770;',
                'class' => 'layui-icon-user',
                'name' => '用户',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            59 => 
            array (
                'id' => 60,
                'unicode' => '&#xe670;',
                'class' => 'layui-icon-find-fill',
                'name' => '发现-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            60 => 
            array (
                'id' => 61,
                'unicode' => '&#xe63d;',
                'class' => 'layui-icon-loading',
                'name' => 'loading',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            61 => 
            array (
                'id' => 62,
                'unicode' => '&#xe63e;',
                'class' => 'layui-icon-loading-1',
                'name' => 'loading',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            62 => 
            array (
                'id' => 63,
                'unicode' => '&#xe654;',
                'class' => 'layui-icon-add-1',
                'name' => '添加',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            63 => 
            array (
                'id' => 64,
                'unicode' => '&#xe652;',
                'class' => 'layui-icon-play',
                'name' => '播放',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            64 => 
            array (
                'id' => 65,
                'unicode' => '&#xe651;',
                'class' => 'layui-icon-pause',
                'name' => '暂停',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            65 => 
            array (
                'id' => 66,
                'unicode' => '&#xe6fc;',
                'class' => 'layui-icon-headset',
                'name' => '音频-耳机',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            66 => 
            array (
                'id' => 67,
                'unicode' => '&#xe6ed;',
                'class' => 'layui-icon-video',
                'name' => '视频',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            67 => 
            array (
                'id' => 68,
                'unicode' => '&#xe688;',
                'class' => 'layui-icon-voice',
                'name' => '语音-声音',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            68 => 
            array (
                'id' => 69,
                'unicode' => '&#xe645;',
                'class' => 'layui-icon-speaker',
                'name' => '消息-通知-喇叭',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            69 => 
            array (
                'id' => 70,
                'unicode' => '&#xe64f;',
                'class' => 'layui-icon-fonts-del',
                'name' => '删除线',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            70 => 
            array (
                'id' => 71,
                'unicode' => '&#xe64e;',
                'class' => 'layui-icon-fonts-code',
                'name' => '代码',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            71 => 
            array (
                'id' => 72,
                'unicode' => '&#xe64b;',
                'class' => 'layui-icon-fonts-html',
                'name' => 'HTML',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            72 => 
            array (
                'id' => 73,
                'unicode' => '&#xe62b;',
                'class' => 'layui-icon-fonts-strong',
                'name' => '字体加粗',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            73 => 
            array (
                'id' => 74,
                'unicode' => '&#xe64d;',
                'class' => 'layui-icon-unlink',
                'name' => '删除链接',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            74 => 
            array (
                'id' => 75,
                'unicode' => '&#xe64a;',
                'class' => 'layui-icon-picture',
                'name' => '图片',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            75 => 
            array (
                'id' => 76,
                'unicode' => '&#xe64c;',
                'class' => 'layui-icon-link',
                'name' => '链接',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            76 => 
            array (
                'id' => 77,
                'unicode' => '&#xe650;',
                'class' => 'layui-icon-face-smile-b',
                'name' => '表情-笑-粗',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            77 => 
            array (
                'id' => 78,
                'unicode' => '&#xe649;',
                'class' => 'layui-icon-align-left',
                'name' => '左对齐',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            78 => 
            array (
                'id' => 79,
                'unicode' => '&#xe648;',
                'class' => 'layui-icon-align-right',
                'name' => '右对齐',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            79 => 
            array (
                'id' => 80,
                'unicode' => '&#xe647;',
                'class' => 'layui-icon-align-center',
                'name' => '居中对齐',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            80 => 
            array (
                'id' => 81,
                'unicode' => '&#xe646;',
                'class' => 'layui-icon-fonts-u',
                'name' => '字体-下划线',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            81 => 
            array (
                'id' => 82,
                'unicode' => '&#xe644;',
                'class' => 'layui-icon-fonts-i',
                'name' => '字体-斜体',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            82 => 
            array (
                'id' => 83,
                'unicode' => '&#xe62a;',
                'class' => 'layui-icon-tabs',
                'name' => 'Tabs 选项卡',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            83 => 
            array (
                'id' => 84,
                'unicode' => '&#xe643;',
                'class' => 'layui-icon-radio',
                'name' => '单选框-选中',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            84 => 
            array (
                'id' => 85,
                'unicode' => '&#xe63f;',
                'class' => 'layui-icon-circle',
                'name' => '单选框-候选',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            85 => 
            array (
                'id' => 86,
                'unicode' => '&#xe642;',
                'class' => 'layui-icon-edit',
                'name' => '编辑',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            86 => 
            array (
                'id' => 87,
                'unicode' => '&#xe641;',
                'class' => 'layui-icon-share',
                'name' => '分享',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            87 => 
            array (
                'id' => 88,
                'unicode' => '&#xe640;',
                'class' => 'layui-icon-delete',
                'name' => '删除',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            88 => 
            array (
                'id' => 89,
                'unicode' => '&#xe63c;',
                'class' => 'layui-icon-form',
                'name' => '表单',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            89 => 
            array (
                'id' => 90,
                'unicode' => '&#xe63b;',
                'class' => 'layui-icon-cellphone-fine',
                'name' => '手机-细体',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            90 => 
            array (
                'id' => 91,
                'unicode' => '&#xe63a;',
                'class' => 'layui-icon-dialogue',
                'name' => '聊天 对话 沟通',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            91 => 
            array (
                'id' => 92,
                'unicode' => '&#xe639;',
                'class' => 'layui-icon-fonts-clear',
                'name' => '文字格式化',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            92 => 
            array (
                'id' => 93,
                'unicode' => '&#xe638;',
                'class' => 'layui-icon-layer',
                'name' => '窗口',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            93 => 
            array (
                'id' => 94,
                'unicode' => '&#xe637;',
                'class' => 'layui-icon-date',
                'name' => '日期',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            94 => 
            array (
                'id' => 95,
                'unicode' => '&#xe636;',
                'class' => 'layui-icon-water',
                'name' => '水 下雨',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            95 => 
            array (
                'id' => 96,
                'unicode' => '&#xe635;',
                'class' => 'layui-icon-code-circle',
                'name' => '代码-圆圈',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            96 => 
            array (
                'id' => 97,
                'unicode' => '&#xe634;',
                'class' => 'layui-icon-carousel',
                'name' => '轮播组图',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            97 => 
            array (
                'id' => 98,
                'unicode' => '&#xe633;',
                'class' => 'layui-icon-prev-circle',
                'name' => '翻页',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            98 => 
            array (
                'id' => 99,
                'unicode' => '&#xe632;',
                'class' => 'layui-icon-layouts',
                'name' => '布局',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            99 => 
            array (
                'id' => 100,
                'unicode' => '&#xe631;',
                'class' => 'layui-icon-util',
                'name' => '工具',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            100 => 
            array (
                'id' => 101,
                'unicode' => '&#xe630;',
                'class' => 'layui-icon-templeate-1',
                'name' => '选择模板',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            101 => 
            array (
                'id' => 102,
                'unicode' => '&#xe62f;',
                'class' => 'layui-icon-upload-circle',
                'name' => '上传-圆圈',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            102 => 
            array (
                'id' => 103,
                'unicode' => '&#xe62e;',
                'class' => 'layui-icon-tree',
                'name' => '树',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            103 => 
            array (
                'id' => 104,
                'unicode' => '&#xe62d;',
                'class' => 'layui-icon-table',
                'name' => '表格',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            104 => 
            array (
                'id' => 105,
                'unicode' => '&#xe62c;',
                'class' => 'layui-icon-chart',
                'name' => '图表',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            105 => 
            array (
                'id' => 106,
                'unicode' => '&#xe629;',
                'class' => 'layui-icon-chart-screen',
                'name' => '图标 报表 屏幕',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            106 => 
            array (
                'id' => 107,
                'unicode' => '&#xe628;',
                'class' => 'layui-icon-engine',
                'name' => '引擎',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            107 => 
            array (
                'id' => 108,
                'unicode' => '&#xe625;',
                'class' => 'layui-icon-triangle-d',
                'name' => '下三角',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            108 => 
            array (
                'id' => 109,
                'unicode' => '&#xe623;',
                'class' => 'layui-icon-triangle-r',
                'name' => '右三角',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            109 => 
            array (
                'id' => 110,
                'unicode' => '&#xe621;',
                'class' => 'layui-icon-file',
                'name' => '文件',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            110 => 
            array (
                'id' => 111,
                'unicode' => '&#xe620;',
                'class' => 'layui-icon-set-sm',
                'name' => '设置-小型',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            111 => 
            array (
                'id' => 112,
                'unicode' => '&#xe61f;',
                'class' => 'layui-icon-add-circle',
                'name' => '添加-圆圈',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            112 => 
            array (
                'id' => 113,
                'unicode' => '&#xe61c;',
                'class' => 'layui-icon-404',
                'name' => '404',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            113 => 
            array (
                'id' => 114,
                'unicode' => '&#xe60b;',
                'class' => 'layui-icon-about',
                'name' => '关于',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            114 => 
            array (
                'id' => 115,
                'unicode' => '&#xe619;',
                'class' => 'layui-icon-up',
                'name' => '箭头 向上',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            115 => 
            array (
                'id' => 116,
                'unicode' => '&#xe61a;',
                'class' => 'layui-icon-down',
                'name' => '箭头 向下',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            116 => 
            array (
                'id' => 117,
                'unicode' => '&#xe603;',
                'class' => 'layui-icon-left',
                'name' => '箭头 向左',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            117 => 
            array (
                'id' => 118,
                'unicode' => '&#xe602;',
                'class' => 'layui-icon-right',
                'name' => '箭头 向右',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            118 => 
            array (
                'id' => 119,
                'unicode' => '&#xe617;',
                'class' => 'layui-icon-circle-dot',
                'name' => '圆点',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            119 => 
            array (
                'id' => 120,
                'unicode' => '&#xe615;',
                'class' => 'layui-icon-search',
                'name' => '搜索',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            120 => 
            array (
                'id' => 121,
                'unicode' => '&#xe614;',
                'class' => 'layui-icon-set-fill',
                'name' => '设置-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            121 => 
            array (
                'id' => 122,
                'unicode' => '&#xe613;',
                'class' => 'layui-icon-group',
                'name' => '群组',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            122 => 
            array (
                'id' => 123,
                'unicode' => '&#xe612;',
                'class' => 'layui-icon-friends',
                'name' => '好友',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            123 => 
            array (
                'id' => 124,
                'unicode' => '&#xe611;',
                'class' => 'layui-icon-reply-fill',
                'name' => '回复 评论 实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            124 => 
            array (
                'id' => 125,
                'unicode' => '&#xe60f;',
                'class' => 'layui-icon-menu-fill',
                'name' => '菜单 隐身 实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            125 => 
            array (
                'id' => 126,
                'unicode' => '&#xe60e;',
                'class' => 'layui-icon-log',
                'name' => '记录',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            126 => 
            array (
                'id' => 127,
                'unicode' => '&#xe60d;',
                'class' => 'layui-icon-picture-fine',
                'name' => '图片-细体',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            127 => 
            array (
                'id' => 128,
                'unicode' => '&#xe60c;',
                'class' => 'layui-icon-face-smile-fine',
                'name' => '表情-笑-细体',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            128 => 
            array (
                'id' => 129,
                'unicode' => '&#xe60a;',
                'class' => 'layui-icon-list',
                'name' => '列表',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            129 => 
            array (
                'id' => 130,
                'unicode' => '&#xe609;',
                'class' => 'layui-icon-release',
                'name' => '发布 纸飞机',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            130 => 
            array (
                'id' => 131,
                'unicode' => '&#xe605;',
                'class' => 'layui-icon-ok',
                'name' => '对 OK',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            131 => 
            array (
                'id' => 132,
                'unicode' => '&#xe607;',
                'class' => 'layui-icon-help',
                'name' => '帮助',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            132 => 
            array (
                'id' => 133,
                'unicode' => '&#xe606;',
                'class' => 'layui-icon-chat',
                'name' => '客服',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            133 => 
            array (
                'id' => 134,
                'unicode' => '&#xe604;',
                'class' => 'layui-icon-top',
                'name' => 'top 置顶',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            134 => 
            array (
                'id' => 135,
                'unicode' => '&#xe600;',
                'class' => 'layui-icon-star',
                'name' => '收藏-空心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            135 => 
            array (
                'id' => 136,
                'unicode' => '&#xe658;',
                'class' => 'layui-icon-star-fill',
                'name' => '收藏-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            136 => 
            array (
                'id' => 137,
                'unicode' => '&#x1007;',
                'class' => 'layui-icon-close-fill',
                'name' => '关闭-实心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            137 => 
            array (
                'id' => 138,
                'unicode' => '&#x1006;',
                'class' => 'layui-icon-close',
                'name' => '关闭-空心',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            138 => 
            array (
                'id' => 139,
                'unicode' => '&#x1005;',
                'class' => 'layui-icon-ok-circle',
                'name' => '正确',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
            139 => 
            array (
                'id' => 140,
                'unicode' => '&#xe608;',
                'class' => 'layui-icon-add-circle-fine',
                'name' => '添加-圆圈-细体',
                'sort' => 0,
                'created_at' => '2019-11-21 15:23:07',
                'updated_at' => '2019-11-21 15:23:07',
            ),
        ));
        
        
    }
}