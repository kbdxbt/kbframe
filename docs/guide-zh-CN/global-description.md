## 全局说明

### 全局函数
```php
user(); // 等价于 Auth::user();
per_page(); //等价于 request()->get('limit', 15);
```

### 控制器
基类控制器使用 $this->params 获取请求的参数，继承直接使用即可
