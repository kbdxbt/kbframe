<div class="layui-form-item" pane="">
    <label class="layui-form-label"><?php echo e($config['title']); ?></label>
    <div class="layui-input-block">
        <?php $__currentLoopData = $config['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="radio" name="<?php echo e($config['name']); ?>" value=<?php echo e($val); ?> title=<?php echo e($key); ?> <?php echo e($config['value']==$val?"checked":""); ?>>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/widgets/radio.blade.php ENDPATH**/ ?>