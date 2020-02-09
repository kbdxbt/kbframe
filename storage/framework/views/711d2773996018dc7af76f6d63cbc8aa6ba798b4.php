<div class="layui-form-item">
    <label for="" class="layui-form-label"><?php echo e($config['title']); ?></label>
    <div class="layui-input-inline">
        <select name="<?php echo e($config['name']); ?>">
            <?php $__currentLoopData = $config['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($val); ?>" <?php echo e($val==$config["value"]?"selected":""); ?>><?php echo $key; ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/widgets/select.blade.php ENDPATH**/ ?>