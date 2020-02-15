<?php

namespace App\Models;

/**
 * Class NotifyRecord 日志记录模型
 * @package App\Models
 * @author kbdxbt <1194174530@qq.com>
 */
class NotifyRecord extends BaseModel
{
    protected $guarded = ['id'];

    /**
     * @param $data
     * @return mixed
     */
    public function formatStatus($data)
    {
        foreach ($data as $key => $val) {
            if ($val['is_read'] == 1) {
                $data[$key]['read_name'] = '<div class="layui-table-cell laytable-cell-1-state"><button class="layui-btn layui-btn-normal layui-btn-xs">已读</button></div>';
            } elseif ($val['is_read'] == 0) {
                $data[$key]['read_name'] = '<div class="layui-table-cell laytable-cell-1-state"><button class="layui-btn layui-btn-primary layui-btn-xs">未读</button></div>';
            }
        }

        return $data;
    }
}
