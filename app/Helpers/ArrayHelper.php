<?php

namespace App\Helpers;

/**
 * Class ArrayHelper
 * @package common\helpers
 * @author jianyan74 <751393839@qq.com>
 */
class ArrayHelper
{
    /**
     * 递归数组
     *
     * @param array $items
     * @param string $idField
     * @param int $pid
     * @param string $pidField
     * @return array
     */
    public static function itemsMerge(array $items, $pid = 0, $idField = "id", $pidField = 'pid', $child = '-')
    {
        $arr = [];
        foreach ($items as $v) {
            if ($v[$pidField] == $pid) {
                $v[$child] = self::itemsMerge($items, $v[$idField], $idField, $pidField);
                $arr[] = $v;
            }
        }

        return $arr;
    }

    /**
     * 传递一个子分类ID返回所有的父级分类
     *
     * @param array $items
     * @param $id
     * @return array
     */
    public static function getParents(array $items, $id)
    {
        $arr = [];
        foreach ($items as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($items, $v['pid']), $arr);
            }
        }

        return $arr;
    }

    /**
     * 传递一个父级分类ID返回所有子分类
     *
     * @param $cate
     * @param int $pid
     * @return array
     */
    public static function getChilds($cate, $pid)
    {
        $arr = [];
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr, self::getChilds($cate, $v['id']));
            }
        }

        return $arr;
    }

    /**
     * 传递一个父级分类ID返回所有子分类ID
     *
     * @param $cate
     * @param $pid
     * @param string $idField
     * @param string $pidField
     * @return array
     */
    public static function getChildIds($cate, $pid, $idField = "id", $pidField = 'pid')
    {
        $arr = [];
        foreach ($cate as $v) {
            if ($v[$pidField] == $pid) {
                $arr[] = $v[$idField];
                $arr = array_merge($arr, self::getChildIds($cate, $v[$idField], $idField, $pidField));
            }
        }

        return $arr;
    }

    /**
     * php二维数组排序 按照指定的key 对数组进行排序
     *
     * @param array $arr 将要排序的数组
     * @param string $keys 指定排序的key
     * @param string $type 排序类型 asc | desc
     * @return array
     */
    public static function arraySort($arr, $keys, $type = 'asc')
    {
        if (count($arr) <= 1) {
            return $arr;
        }

        $keysValue = [];
        $newArray = [];

        foreach ($arr as $k => $v) {
            $keysValue[$k] = $v[$keys];
        }

        $type == 'asc' ? asort($keysValue) : arsort($keysValue);
        reset($keysValue);
        foreach ($keysValue as $k => $v) {
            $newArray[$k] = $arr[$k];
        }

        return $newArray;
    }

    /**
     * 获取数字区间
     *
     * @param int $start
     * @param int $end
     * @return array
     */
    public static function numBetween($start = 0, $end = 1, $key = true)
    {
        $arr = [];
        for ($i = $start; $i <= $end; $i++) {
            $key == true ? $arr[$i] = $i : $arr[] = $i;
        }

        return $arr;
    }

    /**
     * 根据级别和数组返回字符串
     *
     * @param int $level 级别
     * @param array $models
     * @param $k
     * @param int $treeStat 开始计算
     * @return bool|string
     */
    public static function itemsLevel($level, array $models, $k, $treeStat = 1)
    {
        $str = '';
        for ($i = 1; $i < $level; $i++) {
            $str .= '　　';

            if ($i == $level - $treeStat) {
                if (isset($models[$k + 1])) {
                    return $str . "├──";
                }

                return $str . "└──";
            }
        }

        return false;
    }

    /**
     * 必须经过递归才能进行重组为下拉框
     *
     * @param $models
     * @param string $idField
     * @param string $titleField
     * @param int $treeStat
     * @return array
     */
    public static function itemsMergeDropDown($models, $idField = 'id', $titleField = 'title', $treeStat = 1)
    {
        $arr = [];
        foreach ($models as $k => $model) {
            $arr[] = [
                $idField => $model[$idField],
                $titleField => self::itemsLevel($model['level'], $models, $k, $treeStat) . " " . $model[$titleField],
            ];

            if (!empty($model['-'])) {
                $arr = ArrayHelper::merge($arr,
                    self::itemsMergeDropDown($model['-'], $idField, $titleField, $treeStat));
            }
        }

        return $arr;
    }

    /**
     * 数组转xml
     *
     *
     * @param $arr
     * 微信回调成功：['return_code' => 'SUCCESS', 'return_msg' => 'OK']
     * 微信回调失败：['return_code' => 'FAIL', 'return_msg' => 'OK']
     * @return bool|string
     */
    public static function toXml($arr)
    {
        if (!is_array($arr) || count($arr) <= 0) {
            return false;
        }

        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }

        $xml .= "</xml>";
        return $xml;
    }

    /*
    * @param array $array Source array
    * @param array $filters Rules that define array keys which should be left or removed from results.
    * Each rule is:
    * - `var` - `$array['var']` will be left in result.
    * - `var.key` = only `$array['var']['key'] will be left in result.
         * - `!var.key` = `$array['var']['key'] will be removed from result.
    * @return array Filtered array
    * @since 2.0.9
    */
    public static function filter($array, $filters)
    {
        $result = [];
        $forbiddenVars = [];

        foreach ($filters as $var) {
            $keys = explode('.', $var);
            $globalKey = $keys[0];
            $localKey = isset($keys[1]) ? $keys[1] : null;

            if ($globalKey[0] === '!') {
                $forbiddenVars[] = [
                    substr($globalKey, 1),
                    $localKey,
                ];
                continue;
            }

            if (!array_key_exists($globalKey, $array)) {
                continue;
            }
            if ($localKey === null) {
                $result[$globalKey] = $array[$globalKey];
                continue;
            }
            if (!isset($array[$globalKey][$localKey])) {
                continue;
            }
            if (!array_key_exists($globalKey, $result)) {
                $result[$globalKey] = [];
            }
            $result[$globalKey][$localKey] = $array[$globalKey][$localKey];
        }

        foreach ($forbiddenVars as $var) {
            list($globalKey, $localKey) = $var;
            if (array_key_exists($globalKey, $result)) {
                unset($result[$globalKey][$localKey]);
            }
        }

        return $result;
    }
}
