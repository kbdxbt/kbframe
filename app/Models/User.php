<?php

namespace App\Models;

use App\Common\Enums\GenderEnum;
use App\Common\Enums\StatusEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User 用户模型类
 * @package App\Models
 * @author kbdxbt <1194174530@qq.com>
 */
class User extends Authenticatable
{
    use HasRoles,Notifiable;

    public $timestamps = true;

    protected $guard_name = 'backend';

    protected $guarded = ['id'];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    protected $appends = ['gender_value', 'status_value'];

    /*
     * 性别
     */
    public function getGenderValueAttribute($value)
    {
        return GenderEnum::getMap()[$this->attributes['gender']];
    }

    /*
     * 状态
     */
    public function getStatusValueAttribute($value)
    {
        return StatusEnum::getMap()[$this->attributes['status']];
    }
}
