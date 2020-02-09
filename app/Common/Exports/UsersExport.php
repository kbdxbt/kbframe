<?php

namespace App\Common\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\Exportable;

/**
 * Class UsersExport 用户导出类
 * @package App\Common\Exports
 * @author kbdxbt <1194174530@qq.com>
 */
class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     * 参考着用吧，懒得写了 https://docs.laravel-excel.com/3.1/
     */
    public function collection()
    {
    }

    public function query()
    {
        return User::query()->select([
            'id',
            'username',
            'type',
            'nickname',
            'realname',
            'head_portrait',
            'gender',
            'qq',
            'email',
            'birthday',
            'visit_count',
            'home_phone',
            'mobile',
            'last_time',
            'last_ip',
            'pid',
            'status',
            'created_at',
            'updated_at',
        ]);				// 确保不要使用 'get()' 方法
    }

    /**
     * @return array
     */
//    public function columnFormats(): array
//    {
//        return [
//            'H' => NumberFormat::FORMAT_TEXT,
//            'M' => NumberFormat::FORMAT_TEXT,
//            'N' => NumberFormat::FORMAT_TEXT,
//        ];
//    }

    public function headings(): array
    {
        return [
            'ID',
            '帐号',
            '类别',
            '昵称',
            '真实姓名',
            '头像',
            '性别',
            'qq',
            '邮箱',
            '生日',
            '访问次数',
            '家庭号码',
            '手机号码',
            '最后一次登录时间',
            '最后一次登录ip',
            '上级id',
            '状态',
            '创建时间',
            '更改时间',
        ];
    }
}
