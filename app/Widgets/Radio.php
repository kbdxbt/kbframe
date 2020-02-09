<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class Radio 单选按钮小部件
 * @package App\Widgets
 * @author kbdxbt <1194174530@qq.com>
 */
class Radio extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => '',
        'name'  => '',
        'data' => '',
        'value' => ''
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.radio', [
            'config' => $this->config,
        ]);
    }
}
