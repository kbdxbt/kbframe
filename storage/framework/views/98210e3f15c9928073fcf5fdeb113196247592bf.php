<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="/static/layui/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/layui/style/admin.css" media="all">
    <script src="/js/jquery.min.js"></script>
    
    <script src="/static/layui/layui/layui.js"></script>
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layui.config({
        base: '/static/layui/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['element','form','jquery','layer','table','upload','laydate'],function () {
        var element = layui.element;
        var layer = layui.layer;
        var form = layui.form;
        var table = layui.table;
        var upload = layui.upload;
        var laydate = layui.laydate;
    });
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>



<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/layouts/base.blade.php ENDPATH**/ ?>