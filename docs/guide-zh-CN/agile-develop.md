## 敏捷开发
### generate
框架自主研发了一套generate一键生成功能，支持生成Controller类、Request类、Repository类、Magic类、Model类，提高了项目开发效率<br/>
```php
//所有生成类第一个参数类均为文件名，需指定对应的命名空间
//生成Controller类
php artisan generate:controller App\Http\Controllers\Backend\XxController
//生成Model类
php artisan generate:model App\Models\Test
//生成Request类，参数2为数据表名
php artisan generate:request Http\Requests\XxRequest --table xx
//生成Repository类，参数2为使用的Model
php artisan generate:repository App\Repositories\XxRepository --model App\Models\Xx
//生成Magic类
php artisan generate:magic App\Repositories\Magics\XxMagic
```
### other
其他generate可以使用laravel内置或者扩展支持的生成器既可。例如：
```php
php artisan make:widget [--name] // 生成widget
```

