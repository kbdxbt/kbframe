<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class Submit 提交按钮小部件
 * @package App\Widgets
 * @author kbdxbt <1194174530@qq.com>
 */
class Submit extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'id' => '',
        'value' => '',
        'filter' => '',
        'is_hide' => ''
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.submit', [
            'config' => $this->config,
        ]);
    }
}
