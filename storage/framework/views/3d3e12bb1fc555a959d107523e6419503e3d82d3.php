<?php $__env->startSection('content'); ?>
    <div class="layui-card-body" style="background-color: #fff;">
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">修改密码</div>
                        <div class="layui-card-body" pad15>
                            <form action="" method="post" class="layui-form">
                            <div class="layui-form" lay-filter="">
                                <?php echo e(csrf_field()); ?>

                                <?php echo app('arrilot.widget')->run('Text', [
                                    'title'=>'当前密码',
                                    'type'=>'password',
                                    'name'=>'oldPassword',
                                    'value'=>'',
                                    'placeholder'=>'请输入当前密码',
                                    'verify'=>'required'
                                ]); ?>
                                <?php echo app('arrilot.widget')->run('Text', [
                                    'title'=>'新密码',
                                    'type'=>'password',
                                    'name'=>'password',
                                    'value'=>'',
                                    'placeholder'=>'请输入新密码',
                                    'verify'=>'required'
                                ]); ?>
                                <?php echo app('arrilot.widget')->run('Text', [
                                    'title'=>'确认新密码',
                                    'type'=>'password',
                                    'name'=>'rePassword',
                                    'value'=>'',
                                    'placeholder'=>'请输入新密码',
                                    'verify'=>'required'
                                ]); ?>
                            </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" type="submit">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        layui.use(['index', 'form'], function(){
            var $ = layui.$;

            $("form").on("submit",function(event){
                event.preventDefault();
                $.ajax({
                    url: '/backend/user/password',
                    type: "POST",
                    data: $("form").serialize(),
                    dataType:"json",
                    beforeSend: function() {
                        layer.load(1);
                    },
                    success:function(res){
                        layer.closeAll('loading');
                        if (res.code != 0) {
                            layer.msg('错误:'+res.msg, {icon: 2});
                        } else {
                            layer.msg('成功', {icon: 1,time: 1000});
                        }
                    },
                    error:function(data){
                        layer.closeAll('loading');
                        layer.msg('服务器网络错误', {icon: 2});
                    }
                });
            })
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/user/password.blade.php ENDPATH**/ ?>