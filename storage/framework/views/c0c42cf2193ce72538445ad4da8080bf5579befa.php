<?php $__env->startSection('content'); ?>
    <div style="text-align: center;font-size: 20px;">
        <?php echo e($data ?? ''); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/mail/default.blade.php ENDPATH**/ ?>