<?php

namespace App\Repositories;

use App\Models\Icon;

/**
 * Class IconRepository 图标仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class IconRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function newModel()
    {
        return app(Icon::class);
    }
}
