<?php $__env->startSection('content'); ?>
        <div class="layui-card-body" style="background-color: #fff;">
            <form class="layui-form" action="" method="post" id="layui-layer" lay-filter="component-form-element">
                <input type="hidden" name="id" value="<?php echo e($role->id??''); ?>">
                <?php echo e(csrf_field()); ?>

                <?php echo app('arrilot.widget')->run('Text', [
                    'title'=>'角色标识',
                    'type'=>'text',
                    'name'=>'name',
                    'value'=>$role->name??'',
                    'placeholder'=>'请输入角色标识',
                    'verify'=>'required'
                ]); ?>
                <?php echo app('arrilot.widget')->run('Text', [
                    'title'=>'角色名称',
                    'type'=>'text',
                    'name'=>'display_name',
                    'value'=>$role->display_name??'',
                    'placeholder'=>'请输入角色名称',
                    'verify'=>'required'
                ]); ?>
                <?php echo app('arrilot.widget')->run('Text', [
                    'title'=>'排序',
                    'type'=>'text',
                    'name'=>'sort',
                    'value'=>$role->sort??'',
                    'placeholder'=>'请输入排序',
                ]); ?>
                <?php echo app('arrilot.widget')->run('Submit', [
                    'id'=>'LAY-user-backend-submit',
                    'value'=>'确认',
                    'filter'=>'LAY-user-backend-submit',
                    'hide'=>'',
                ]); ?>
            </form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/role/edit.blade.php ENDPATH**/ ?>