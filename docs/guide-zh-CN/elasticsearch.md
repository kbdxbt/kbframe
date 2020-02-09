## Elasticsearch 使用
框架封装了Mysql全量同步数据到Elasticsearch的示例，通过控制台模式进行同步。支持类似Query大部分的增删改查等基础方法使用。
## Elasticsearch同步数据
```php
php artisan es:sync 
```
```php
public function handle(\Kbdxbt\ElasticSearchQuery\Builder $builder)
{
    // 演示示例，请根据自己真实应用场景进行同步
    $count = 1;
    $total = 5000;

    while (true) {
        //根据需求更换Model
        $data = \App\Models\User::whereBetween('id', [($count - 1) * $total, ($count) * $total])
                ->get()->toArray();
        $count++;

        if (empty($data)) break;

        $builder->index('test')->type('user')->bulk($data);
        echo last($data)['id'] . "\n";
    }
}
```
## Elasticsearch CURD
可以参考UserController注释Elasticsearch用法
相关文档：https://github.com/kbdxbt/laravel-elasticsearch-query
