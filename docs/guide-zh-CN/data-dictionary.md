## 数据字典
* [action_log](#action_log)
* [attachment](#attachment)
* [config](#config)
* [db_log](#db_log)
* [icon](#icon)
* [jobs](#jobs)
* [migrations](#migrations)
* [model_has_permissions](#model_has_permissions)
* [model_has_roles](#model_has_roles)
* [notify](#notify)
* [notify_record](#notify_record)
* [permissions](#permissions)
* [req_log](#req_log)
* [role_has_permissions](#role_has_permissions)
* [roles](#roles)
* [users](#users)



-------------------

<h3 id='action_log'>1. action_log</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(11)|NO|PRI||auto_increment|id|
|app|varchar(32)|YES||||平台|
|user_id|int(11)|YES||||用户id|
|username|varchar(50)|YES||||用户名|
|type|varchar(16)|YES||||类型|
|group|varchar(16)|YES||||分组|
|level|int(11)|YES||||等级|
|url|varchar(255)|YES||||访问地址|
|params|varchar(255)|YES||||参数|
|remark|varchar(255)|YES||||备注|
|status|varchar(255)|YES||||状态|
|ip|varchar(255)|YES||||ip|
|created_at|datetime|YES||||创建时间|


-------------------

<h3 id='attachment'>2. attachment</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(11)|NO|PRI||auto_increment||
|drive|varchar(50)|YES||||驱动|
|upload_type|varchar(10)|YES||||上传类型|
|specific_type|varchar(100)|NO||||类别|
|base_url|varchar(1000)|YES||||url|
|path|varchar(1000)|YES||||本地路径|
|md5|varchar(100)|YES|MUL|||md5校验码|
|name|varchar(1000)|YES||||文件原始名|
|extension|varchar(50)|YES||||扩展名|
|size|int(11)|YES||0||长度|
|year|int(10) unsigned|YES||0||年份|
|month|int(11)|YES||0||月份|
|day|int(10) unsigned|YES||0||日|
|upload_ip|varchar(16)|YES||||上传者ip|
|status|tinyint(1)|NO||1||状态[-1:删除;0:禁用;1启用]|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||


-------------------

<h3 id='config'>3. config</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(10) unsigned|NO|PRI||auto_increment|配置ID|
|app|varchar(32)|NO||||配置用途|
|title|varchar(32)|NO||||配置标题|
|name|varchar(32)|YES|UNI|||配置名称|
|value|text|NO||||配置值|
|group|tinyint(1)|NO||0||配置分组|
|type|varchar(16)|NO||||配置类型|
|options|varchar(255)|NO||||配置额外值|
|tip|varchar(100)|NO||||配置说明|
|sort|tinyint(1)|NO||0||排序|
|status|tinyint(1)|NO||0||状态|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||


-------------------

<h3 id='db_log'>4. db_log</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(11)|NO|PRI||auto_increment|ID|
|app|varchar(32)|YES||||平台|
|type|varchar(50)|YES||||请求类型|
|url|varchar(255)|YES||||请求url|
|method|varchar(100)|YES||||请求方法|
|query|text|YES||||执行语句|
|time|varchar(50)|YES||||执行时间|
|created_at|datetime|YES||||创建时间|


-------------------

<h3 id='icon'>5. icon</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(10) unsigned|NO|PRI||auto_increment||
|unicode|varchar(191)|YES||||unicode 字符|
|class|varchar(191)|YES||||类名|
|name|varchar(191)|YES||||名称|
|sort|int(11)|NO||0||排序|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||


-------------------

<h3 id='jobs'>6. jobs</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|bigint(20) unsigned|NO|PRI||auto_increment||
|queue|varchar(191)|NO|MUL||||
|payload|text|NO|||||
|attempts|tinyint(1)|NO|||||
|reserved_at|int(10) unsigned|YES|||||
|available_at|int(10) unsigned|NO|||||
|created_at|int(10) unsigned|NO|||||


-------------------

<h3 id='migrations'>7. migrations</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(10) unsigned|NO|PRI||auto_increment||
|migration|varchar(255)|NO|||||
|batch|int(11)|NO|||||


-------------------

<h3 id='model_has_permissions'>8. model_has_permissions</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|permission_id|int(10) unsigned|NO|PRI||||
|model_id|int(10) unsigned|NO|PRI||||
|model_type|varchar(191)|NO|PRI||||


-------------------

<h3 id='model_has_roles'>9. model_has_roles</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|role_id|int(10) unsigned|NO|PRI||||
|model_id|int(10) unsigned|NO|PRI||||
|model_type|varchar(191)|NO|PRI||||


-------------------

<h3 id='notify'>10. notify</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|bigint(20)|NO|PRI||auto_increment|主键|
|title|varchar(150)|YES||||标题|
|content|text|YES||||消息内容|
|type|tinyint(1)|YES||0||消息类型[1:公告;2:提醒;3:信息(私信)|
|target_id|int(11)|YES||0||目标id|
|target_type|varchar(100)|YES||||目标类型|
|target_display|int(11)|YES||1||接受者是否删除|
|action|varchar(100)|YES||||动作|
|view|int(11)|YES||0||浏览量|
|sender_id|int(11)|YES||0||发送者id|
|sender_display|tinyint(1)|YES||1||发送者是否删除|
|sender_withdraw|tinyint(1)|YES||1||是否撤回 0是撤回|
|status|tinyint(1)|NO||1||状态[-1:删除;0:禁用;1启用]|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||


-------------------

<h3 id='notify_record'>11. notify_record</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(11)|NO|PRI||auto_increment||
|user_id|int(10) unsigned|NO||0||管理员id|
|notify_id|int(11)|YES||0||消息id|
|is_read|tinyint(1)|YES||0||是否已读 1已读|
|type|tinyint(1)|YES||0||消息类型[1:公告;2:提醒;3:信息(私信)|
|status|tinyint(1)|NO||1||状态[-1:删除;0:禁用;1启用]|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||


-------------------

<h3 id='permissions'>12. permissions</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(10) unsigned|NO|PRI||auto_increment|id|
|name|varchar(191)|NO||||权限标识|
|guard_name|varchar(191)|NO||||权限组|
|display_name|varchar(191)|NO||||权限名称|
|route|varchar(191)|YES||||路由名称|
|icon_id|int(11)|YES||||图标ID|
|parent_id|int(11)|NO||0||上一级id|
|sort|int(11)|YES||0||排序|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||
|status|tinyint(1)|YES||1||状态[-1:删除;0:禁用;1启用]|


-------------------

<h3 id='req_log'>13. req_log</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(11)|NO|PRI||auto_increment|ID|
|app|varchar(32)|YES||||平台|
|user_id|int(11)|YES||||用户id|
|method|varchar(100)|YES||||请求方法|
|route|varchar(100)|YES||||路由名称|
|action|varchar(100)|YES||||请求方法|
|url|varchar(255)|YES||||请求地址|
|path|varchar(100)|YES||||请求路径|
|res_data|text|YES||||请求数据|
|header_data|text|YES||||请求头数据|
|ip|varchar(100)|YES||||ip|
|http_code|varchar(10)|YES||||http状态码|
|port|varchar(10)|YES||||端口|
|format_type|varchar(10)|YES||||数据类型|
|error_code|varchar(10)|YES||||错误码|
|error_data|text|YES||||错误数据|
|device|varchar(255)|YES||||设置名称|
|version|varchar(100)|YES||||版本|
|created_at|datetime|YES||||创建时间|


-------------------

<h3 id='role_has_permissions'>14. role_has_permissions</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|permission_id|int(10) unsigned|NO|PRI||||
|role_id|int(10) unsigned|NO|PRI||||


-------------------

<h3 id='roles'>15. roles</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(10) unsigned|NO|PRI||auto_increment|id|
|name|varchar(191)|NO||||角色标识|
|guard_name|varchar(191)|NO||||角色组|
|display_name|varchar(191)|YES||||角色名称|
|sort|int(11)|YES||0||排序|
|status|tinyint(1)|YES||1||状态[-1:删除;0:禁用;1启用]|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||


-------------------

<h3 id='users'>16. users</h3>

|字段|类型|为空|键|默认值|特性|备注|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|id|int(11)|NO|PRI||auto_increment|主键|
|username|varchar(20)|YES|MUL|||帐号|
|password|varchar(150)|YES||||密码|
|auth_key|varchar(32)|YES||||授权令牌|
|remember_token|varchar(150)|YES||||Token令牌|
|type|tinyint(1)|YES||1||类别[1:普通会员;10管理员]|
|nickname|varchar(50)|YES||||昵称|
|realname|varchar(50)|YES||||真实姓名|
|head_portrait|varchar(150)|YES||||头像|
|gender|tinyint(1)|YES||0||性别[0:未知;1:男;2:女]|
|qq|varchar(20)|YES||||qq|
|email|varchar(60)|YES||||邮箱|
|birthday|date|YES||||生日|
|visit_count|int(10) unsigned|YES||1||访问次数|
|home_phone|varchar(20)|YES||||家庭号码|
|mobile|varchar(20)|YES|MUL|||手机号码|
|last_time|int(11)|YES||0||最后一次登录时间|
|last_ip|varchar(16)|YES||||最后一次登录ip|
|pid|int(10) unsigned|YES||0||上级id|
|status|tinyint(1)|YES||1||状态[-1:删除;0:禁用;1启用]|
|created_at|timestamp|YES|||||
|updated_at|timestamp|YES|||||
