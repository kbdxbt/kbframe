<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class EsSyncData Es同步数据
 * @package App\Console\Commands
 * @author kbdxbt <1194174530@qq.com>
 */
class EsSyncData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Es Sync Data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(\Kbdxbt\ElasticSearchQuery\Builder $builder)
    {
        // 演示示例，请根据自己真实应用场景进行同步
        $count = 1;
        $total = 5000;

        while (true) {
            $data = \App\Models\User::whereBetween('id', [($count - 1) * $total, ($count) * $total])
                ->get()->toArray();
            $count++;

            if (empty($data)) break;

            $builder->index('test')->type('user')->bulk($data);
            echo last($data)['id'] . "\n";
        }
    }
}
