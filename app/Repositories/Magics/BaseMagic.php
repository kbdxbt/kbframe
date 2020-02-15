<?php

namespace App\Repositories\Magics;

use Kbdxbt\LaravelRepository\AbstractMagic;
use Kbdxbt\LaravelRepository\Contracts\QueryRelate;

/**
 * Class BaseMagic 基础查询类
 * @package App\Repositories\Magics
 * @author kbdxbt <1194174530@qq.com>
 */
class BaseMagic extends AbstractMagic
{
    /**
     * @return BaseMagic|\CrCms\Repository\Concerns\HasData
     */
    public function setDefaultStatus()
    {
        return isset($this->data['status']) ? $this : $this->addData('status', ['>=' => 0]);
    }

    /**
     * @return BaseMagic|\CrCms\Repository\Concerns\HasData
     */
    public function setDefaultSort($attr, $order)
    {
        return isset($this->data['sort']) ? $this : $this->addData('sort', [$attr => $order]);
    }

    /**
     * @param QueryRelate $queryRelate
     * @param int $id
     * @return QueryRelate
     */
    protected function byId(QueryRelate $queryRelate, $id)
    {
        if (is_array($id)) {
            return $queryRelate->whereIn('id', $id);
        } else {
            return $queryRelate->where('id', '=', $id);
        }
    }

    /**
     * @param QueryRelate $queryRelate
     * @param string $title
     * @return QueryRelate
     */
    protected function byStatus(QueryRelate $queryRelate, $status)
    {
        if (is_array($status)) {
            return $queryRelate->where('status', key($status), array_values($status));
        } else {
            return $queryRelate->where('status', '=', $status);
        }
    }

    /**
     * @param QueryRelate $queryRelate
     * @param array $sort
     * @return QueryRelate
     */
    protected function bySort(QueryRelate $queryRelate, $sort)
    {
        return $queryRelate->orderByArray($sort);
    }

    /**
     * @param QueryRelate $queryRelate
     * @param $start
     * @return QueryRelate
     */
    protected function byStart(QueryRelate $queryRelate, $start)
    {
        if ($start instanceof \DateTimeInterface) {
            $value = $start->format('Y-m-d');
        }

        return $queryRelate->where('created_at', '>=', $value);
    }

    /**
     * @param QueryRelate $queryRelate
     * @param $end
     * @return QueryRelate
     */
    protected function byEnd(QueryRelate $queryRelate, $end)
    {
        if ($end instanceof \DateTimeInterface) {
            $value = $end->format('Y-m-d');
        }

        return $queryRelate->where('created_at', '<=', $value);
    }
}
