<div class="layui-form-item">
    <label for="" class="layui-form-label"><?php echo e($config['title']); ?></label>
</div>
<script id="<?php echo e($config['id']); ?>" name="<?php echo e($config['name']); ?>" type="text/plain"></script>
<?php echo $__env->make('vendor.ueditor.assets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">
    var ue = UE.getEditor('container', {
        autoHeight: false
    });
    ue.ready(function() {
        ue.setContent('<?php echo e($config['content']??''); ?>');
        ue.execCommand('serverparam', '_token', '<?php echo e(csrf_token()); ?>'); // 设置 CSRF token.
    });
</script>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/widgets/u_editor.blade.php ENDPATH**/ ?>