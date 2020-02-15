<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台登录</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/layui/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/layui/style/login.css" media="all">
    <script src="/js/jquery.min.js"></script>
    <script src="/static/layui/layui/layui.js"></script>
</head>
<body>

<div class="layadmin-user-login layadmin-user-display-show" >

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>kbframe<br/>欢迎登录</h2>
        </div>

        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <form class="layui-form" id="layui-layer" lay-filter="component-form-element">
                <?php echo e(csrf_field()); ?>

                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                    <input type="text" name="username" value="<?php echo e(old('username')); ?>" lay-verify="required" placeholder="用户名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                    <input type="password" name="password" lay-verify="required" placeholder="密码" class="layui-input">
                </div>
                                            
                                                
                                                    
                                                        
                                                        
                                                    
                                                    
                                                        
                                                            
                                                        
                                                    
                                                
                                            
                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
                    <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                </div>
                <div class="layui-form-item">
                    <button data-type="login" class="layui-btn layui-btn-fluid" lay-submit lay-filter="login">立即登录</button>
                </div>
            </form>
        </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

    </div>
</div>

<script>
    layui.config({
        base: '/static/layui/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'user', 'form'], function(){
        var layer = layui.layer;
        var form = layui.form;

        form.on('submit(login)', function(data){
            $.ajax({
                url: '<?php echo e(route('backend.login')); ?>',
                data: data.field,
                type: "post",
                beforeSend: function() {
                    layer.load(1);
                },
                success:function(res){
                    layer.closeAll('loading');
                    if (res.code != 0) {
                        layer.msg('错误:'+res.msg, {icon: 2,time:2000});
                    } else {
                        layer.msg('成功', {icon: 1,time: 1000});
                        location.href = '/backend/index';
                    }
                },
                error:function(res){
                    layer.closeAll('loading');
                    if (res.status !== 422) {
                        layer.msg('服务器网络错误', {icon: 2});
                    } else {
                        layer.msg('错误:'+res.responseJSON.msg, {icon: 2});
                    }
                }
            });
            return false;
        });
    })
</script>
</body>
</html>

<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/login/login.blade.php ENDPATH**/ ?>