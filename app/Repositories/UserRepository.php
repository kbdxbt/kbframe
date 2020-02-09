<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository 用户仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $scenes = [
    ];

    /**
     * @var array
     */
    protected $guard = [
        'username', 'nickname', 'mobile', 'gender', 'head_portrait', 'qq', 'email', 'birthday', 'status', 'password'
    ];

    /**
     * @return Model
     */
    public function newModel()
    {
        return app(User::class);
    }
}
