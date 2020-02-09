<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

/**
 * Class Picture 上传图片小部件
 * @package App\Widgets
 * @author kbdxbt <1194174530@qq.com>
 */
class Picture extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'id' => '',
        'uuid'=>'',
        'title' => '',
        'key' => '',
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

        return view('widgets.picture', [
            'config' => $this->config,
        ]);
    }
}
