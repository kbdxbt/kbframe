
### 新建子模块
* 先在git创建好仓库，并初始化仓库
* TortoiseGit -> 添加子模块 -> 填写仓库地址 -> 填写路径（Modules/新模块简称）
* 执行 laravel-module 创建新模块
```bash
php artisan module:make 新模块简称
```


修改子模块地址
git submodule sync

git submodule update --init --recursive
