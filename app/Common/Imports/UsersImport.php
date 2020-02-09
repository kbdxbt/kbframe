<?php

namespace App\Common\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

/**
 * Class UsersImport 用户导入类
 * @package App\Common\Exports
 * @author kbdxbt <1194174530@qq.com>
 */
class UsersImport implements ToModel
{
    /**
    * @param array $row
    * 参考着用吧，懒得写了 https://docs.laravel-excel.com/3.1/
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username'     => $row[0],
            'password' => Hash::make($row[1]),
        ]);
    }
}
