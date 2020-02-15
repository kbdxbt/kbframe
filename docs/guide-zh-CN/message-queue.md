## 消息队列
框架内置了两种消息队列的方式(Redis,RabbitMq)，仅仅只需要修改配置参数即可使用。
### sms-queue
sms扩展使用的是overtrue/easy-sms，第一步需先按配置格式填好config/sms.php，接下来就可以使用了，示例代码如下：
```php
public function sendSms(SmsService $service) {
    // 使用队列发送
    //SmsQueue::dispatch('18888888888', rand(1000, 9999));
    // 实时发送
    //SmsQueue::dispatchNow('18888888888', rand(1000, 9999));
    // 批量发送
    //for ($i = 0; $i < 10; $i++) {
    //    SmsQueue::dispatch('18888888888', rand(1000, 9999));
    //}
    // 推荐用下面的方式
    $service->setConfig(true)->realSend('18888888888', rand(1000, 9999));
}
```
### mailer-queue
mailer扩展使用的是laravel内置的，第一步需先填好.env邮件参数，第二步可通过使用views/mail的文件做为邮件模块，接下来就可以使用了，示例代码如下：
```php
public function sendMail(MailerService $service)
{
    // 使用队列发送
    //MailerQueue::dispatch('8888888@qq.com', '测试邮件');
    // 实时发送
    //MailerQueue::dispatchNow('8888888@qq.com', '测试邮件');
    // 批量发送
    //for ($i = 0; $i < 10; $i++) {
    //    MailerQueue::dispatch('8888888@qq.com', '测试邮件');
    //}
    $service->setConfig(false)->realSend('8888888@qq.com', '测试邮件');
}
```
### log-queue
log扩展支持monogdb和mysql两种数据存储方式，框架内置了请求日志，行为日志，数据操作日志，其中数据操作日志内置在QueryListener里且不允许使用mysql记录。配置好相应数据库配置操作即可使用，示例代码如下：
```php
public function saveLog(LogService $service)
{
     // 使用队列添加日志
     //LogQueue::dispatch('req');
     $service->setDb('mysql')->realSave('action', [
         'group' => 'user',
         'level' => '1',
         'params' => '',
         'remark' => '用户登录',
         'status' => '1'
     ]);
}
```