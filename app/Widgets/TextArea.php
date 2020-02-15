<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class TextArea 多行文本框小部件
 * @package App\Widgets
 * @author kbdxbt <1194174530@qq.com>
 */
class TextArea extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => '',
        'name'  => '',
        'value' => '',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.text_area', [
            'config' => $this->config,
        ]);
    }
}
