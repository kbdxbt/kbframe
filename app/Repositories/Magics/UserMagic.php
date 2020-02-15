<?php

namespace App\Repositories\Magics;

use Kbdxbt\LaravelRepository\Contracts\QueryRelate;

/**
 * Class UserMagic 用户查询类
 * @package App\Repositories\Magics
 * @author kbdxbt <1194174530@qq.com>
 */
class UserMagic extends BaseMagic
{
    /**
     * @var array
     * 按场景查询条件约束
     */
    protected $scenes = [
        'backend' => ['id', 'username', 'mobile', 'status'],
    ];

    /**
     * @var array
     * 全局查询条件约束
     */
//    protected $guard = [
//        'username', 'mobile'
//    ];

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byUsername(QueryRelate $queryRelate, $username)
    {
        return $queryRelate->where('username', 'like', "%{$username}%");
    }

    /**
     * @param QueryRelate $queryRelate
     * @param string $title
     * @return QueryRelate
     */
    protected function byMobile(QueryRelate $queryRelate, $mobile)
    {
        return $queryRelate->where('mobile', 'like', "%{$mobile}%");
    }
}
