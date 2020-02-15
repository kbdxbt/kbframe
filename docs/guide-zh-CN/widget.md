## Widget 使用
框架采用了Widgets(小部件)对视图层进行封装，内置了丰富的表单控件，常用的图片上传、单选框、多选框、提交按钮、文本框、多行文件框、UE编辑器。开箱即用，非常实用。
### 内置Widget
* 图片上传
* 单选框
* 多选框
* 提交按钮
* 文本框
* 多行文本框
* UE编辑器
使用示例：
```php
@widget('Text', [
    'title'=>'用户名',
    'type'=>'text',
    'name'=>'username',
    'value'=>$user->username,
    'placeholder'=>'请输入用户名',
    'verify'=>'required'
])
```
### 添加Widget
```php
php artisan make:widget [--name] // 生成widget
```
编辑Widget相应的文件配置完成后即可在视图层调用。