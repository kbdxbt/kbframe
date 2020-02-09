## Upload 上传
支持图片上传，视频上传，语音上传，base64上传。支持本地上传和对象存储类型，目前支持本地存储、腾讯 COS、阿里云 OOS、七牛云存储一键切换，且增加其他第三方存储也非常方便，真正的开箱即用。
### 图片上传
图片上传后支持生成多规格的缩略图，生成水印，压缩图片质量等常用操作和使用对象存储，请先配置filesystems.php相关参数,示例代码：
```php
public function images(Request $request)
{
    $upload = new UploadHelper($request->file(), UploadEnum::UPLOAD_TYPE_IMAGES);
    $upload->verifyFile();
    $upload->save();

    return $this->success($upload->getBaseInfo());
}
```
请求地址(Post)
```
/upload/images
```
参数

参数名 | 参数类型| 必填 | 默认 | 说明 | 备注
---|---|---|---|---|---
file | string| 是 | 无 | 文件 | 
drive | string| 否 | local | 本地上传 | oss:阿里云;qiniu:七牛;cos:腾讯
thumb | array| 否 | 无 | 生成缩略图(具体看例子) | 

thumb 数组例子(生成`100*100`和`200*200`的缩略图)
```
{
	"thumb": [{
		"widget": 100,
		"height": 100
	}, {
		"widget": 200,
		"height": 200
	}]
}
```
返回
```
{
    "code": 200,
    "message": "OK",
    "data": {
        "url": "1.jpg",
    }
}
```
### 视频上传
```
/upload/videos
```
参数

参数名 | 参数类型| 必填 | 默认 | 说明 | 备注
---|---|---|---|---|---
file | string| 是 | 无 | 文件 | 
drive | string| 否 | local | 本地上传 | oss:阿里云;qiniu:七牛;cos:腾讯


### 语音上传
```
/upload/voices
```
参数

参数名 | 参数类型| 必填 | 默认 | 说明 | 备注
---|---|---|---|---|---
file | string| 是 | 无 | 文件 | 
drive | string| 否 | local | 本地上传 | oss:阿里云;qiniu:七牛;cos:腾讯

### 文件上传
```
/upload/files
```
参数

参数名 | 参数类型| 必填 | 默认 | 说明 | 备注
---|---|---|---|---|---
file | string| 是 | 无 | 文件 | 
drive | string| 否 | local | 本地上传 | oss:阿里云;qiniu:七牛;cos:腾讯

### base64上传
```
/upload/base64
```
参数

参数名 | 参数类型| 必填 | 默认 | 说明 | 备注
---|---|---|---|---|---
image | string| 是 | 无 | 文件 | 
drive | string| 否 | local | 本地上传 | oss:阿里云;qiniu:七牛;cos:腾讯
extend | string| 否 | jpg | 文件后缀 | 
