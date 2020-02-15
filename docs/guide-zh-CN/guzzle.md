## Guzzle 使用
框架使用了Guzzle代替了原生Curl方法，框架内不允许使用原生Curl，均由Guzzle接管。
### 创建请求
```php
$request = new Request('GET', 'http://www.baidu.com');
$response = $client->send($request, ['timeout' => 2]);
```
### 并发请求
```php
public function multiCurl()
{
    $client = new Client();
    $requests = function ($total) {
        $uri = 'http://www.baidu.com';
        for ($i = 0; $i < $total; $i++) {
            yield new Request('GET', $uri);
        }
    };

    $pool = new Pool($client, $requests(100), [
        'concurrency' => 5, //一次并发的请求数
        'fulfilled' => function (Response $response, $index) {
            // 处理成功的请求
            echo $index.'-success<br/>';
        },

        'rejected' => function (RequestException $reason, $index) {
            // 处理失败的请求
            echo $index.'-failed<br/>';
        },
    ]);

    // 启动
    $promise = $pool->promise();

    // 强制完成请求
    $promise->wait();
}
```
