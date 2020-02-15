<?php $__env->startSection('content'); ?>
    <div class="layui-card-body" style="background-color: #fff;">
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body" pad15>
                            <form action="" method="post" class="layui-form">
                                <div class="layui-form" lay-filter="">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo app('arrilot.widget')->run('Text', [
                                        'title'=>'用户名',
                                        'type'=>'text',
                                        'name'=>'username',
                                        'value'=>$user->username,
                                        'placeholder'=>'请输入用户名',
                                        'verify'=>'required'
                                    ]); ?>
                                    <?php echo app('arrilot.widget')->run('Text', [
                                        'title'=>'昵称',
                                        'type'=>'text',
                                        'name'=>'nickname',
                                        'value'=>$user->nickname,
                                        'placeholder'=>'请输入昵称',
                                        'verify'=>'required'
                                    ]); ?>
                                    <?php echo app('arrilot.widget')->run('Radio', [
                                        'title'=>'性别',
                                        'name'=>'gender',
                                        'data'=>[
                                            '男'=>'1',
                                            '女'=>'2',
                                            '未知'=>'0'
                                        ],
                                        'value'=>$user->gender,
                                    ]); ?>
                                    <?php echo app('arrilot.widget')->run('Picture', [
                                        'id'=>'upload-head-portrait',
                                        'title'=>'头像',
                                        'key'=>'上传图片',
                                        'name'=>'head_portrait',
                                        'value'=>$user->head_portrait,
                                    ]); ?>
                                    <?php echo app('arrilot.widget')->run('Text', [
                                        'title'=>'QQ',
                                        'type'=>'text',
                                        'name'=>'qq',
                                        'value'=>$user->qq,
                                        'placeholder'=>'请输入QQ'
                                    ]); ?>
                                    <?php echo app('arrilot.widget')->run('Text', [
                                        'title'=>'邮箱',
                                        'type'=>'email',
                                        'name'=>'email',
                                        'value'=>$user->email,
                                        'placeholder'=>'请输入Email'
                                    ]); ?>
                                    <?php echo app('arrilot.widget')->run('Text', [
                                        'id'=>'birthday',
                                        'title'=>'生日',
                                        'type'=>'text',
                                        'name'=>'birthday',
                                        'value'=>$user->birthday,
                                        'placeholder'=>'yyyy-MM-dd'
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
                    url: '/backend/user/personal',
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




<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/user/personal.blade.php ENDPATH**/ ?>