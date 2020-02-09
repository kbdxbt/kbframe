<?php $__env->startSection('content'); ?>
    <div class="layui-card-body" style="background-color: #fff;">
        <form class="layui-form" action="" method="post" id="layui-layer" lay-filter="component-form-element">
            <input type="hidden" name="id" value="<?php echo e($announce->id??''); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo app('arrilot.widget')->run('Text', [
                'title'=>'标题',
                'type'=>'text',
                'name'=>'title',
                'value'=>$announce->title??'',
                'placeholder'=>'请输入标题',
                'verify'=>'required'
            ]); ?>
            <?php echo app('arrilot.widget')->run('UEditor', [
                'id'=>'container',
                'name'=>'content',
                'title'=>'内容',
                'content'=>$announce->content??'',
            ]); ?>
            <style>
                #container {
                    margin-left: 110px;
                    margin-top: -50px;
                }
            </style>
            <?php echo app('arrilot.widget')->run('Submit', [
                'id'=>'LAY-user-backend-submit',
                'value'=>'确认',
                'filter'=>'LAY-user-backend-submit',
                'hide'=>'',
            ]); ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/announce/edit.blade.php ENDPATH**/ ?>