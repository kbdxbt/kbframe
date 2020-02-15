<?php

namespace App\Repositories;

use Kbdxbt\LaravelRepository\AbstractRepository;

/**
 * Class BaseRepository 基础数据仓库类
 * @package App\Repositories
 * @author kbdxbt <1194174530@qq.com>
 */
class BaseRepository extends AbstractRepository
{
    /**
     * @return object
     */
    public function newModel()
    {
    }

    /**
     * 返回模型
     */
    public function findModel($id = -1)
    {
        return $this->newModel()->firstOrNew(['id'=>$id]);
    }
}
