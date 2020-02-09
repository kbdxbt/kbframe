<?php

namespace App\Repositories;

use App\Models\Config;

/**
 * Class ConfigRepository 配置仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class ConfigRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function newModel()
    {
        return app(Config::class);
    }
}
