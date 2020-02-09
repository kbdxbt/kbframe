<?php

namespace App\Http\Controllers\Backend;

use App\Models\Config;
use App\Repositories\ConfigRepository;
use App\Repositories\Magics\ConfigMagic;
use Illuminate\Support\Facades\Request;

/**
 * Class ConfigController 配置控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class ConfigController extends BaseController
{
    /**
     * 配置用途
     * @var string
     */
    protected $app = 'backend';

    /**
     * ConfigController constructor.
     * @param ConfigRepository $repository
     */
    public function __construct(ConfigRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_id = request()->input('group', '1');
        $configs = $this->repository
            ->magic((new ConfigMagic(['app'=>$this->app]))->setDefaultStatus()->setCurrentScene('backend'))
            ->get()->toArray();
        $groups = Config::$configMap;

        $config = [];
        if ($configs) {
            foreach ($configs as $item) {
                $config[$item['title']] = $item['value'];
            }
        }

        return view('backend.config.index', compact('config', 'group_id', 'groups'));
    }

    /**
     * 保存配置
     */
    public function save(Request $request)
    {
        $data = request()->input('config');

        $configs = $this->repository
            ->magic((new ConfigMagic(['app'=>$this->app, 'title'=>array_keys($data)]))->setDefaultStatus()->setCurrentScene('backend'))
            ->get();

        foreach ($configs as $item) {
            $val = $data[$item->title] ?? '';
            if ($val != $item->value) {
                $item->value = $val;
                $item->save();
            }
        }

        return $this->success('成功');
    }
}
