<div class="layui-form-item">
    <label for="" class="layui-form-label"><?php echo e($config['title']); ?></label>
    <div class="layui-input-inline">
        <input id="<?php echo e($config['id']); ?>" type="<?php echo e($config['type']); ?>" name="<?php echo e($config['name']); ?>" value="<?php echo e($config['value']); ?>" placeholder="<?php echo e($config['placeholder']); ?>" <?php echo e($config['required']?"lay-verify=".$config['required']:""); ?> <?php echo e($config['verify']?"lay-verify=".$config['verify']:''); ?> autocomplete="off" class="layui-input">
    </div>
</div>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/widgets/text.blade.php ENDPATH**/ ?>