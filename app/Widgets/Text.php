<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class Text 文本框小部件
 * @package App\Widgets
 * @author kbdxbt <1194174530@qq.com>
 */
class Text extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'id' => '',
        'title' => '',
        'type' => '',
        'name'  => '',
        'value' => '',
        'placeholder' => '',
        'required' => '',
        'verify' => ''
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        return view('widgets.text', [
            'config' => $this->config,
        ]);
    }
}
