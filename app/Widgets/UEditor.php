<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class UEditor UE编辑器
 * @package App\Widgets
 * @author kbdxbt <1194174530@qq.com>
 */
class UEditor extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'id' => '',
        'name' => '',
        'title' => '',
        'content' => ''
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.u_editor', [
            'config' => $this->config,
        ]);
    }
}
