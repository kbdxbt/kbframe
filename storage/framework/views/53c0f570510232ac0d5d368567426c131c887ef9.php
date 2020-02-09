<div class="layui-form-item layui-col-lg6">
    <label class="layui-form-label"><?php echo e($config['title']); ?></label>
    <button type="button" class="layui-btn" id="<?php echo e($config['id']); ?>"><?php echo e($config['key']); ?></button>
    <div class="layui-upload-list">
        <img src="<?php echo e($config['value']); ?>" id="<?php echo e($config['uuid']); ?>" style="width:100px;height:100px;margin-left:110px;" class="layui-upload-img">
        <input type="hidden" name="<?php echo e($config['name']); ?>" value="<?php echo e($config['value']); ?>" class="layui-input">
    </div>
</div>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/widgets/picture.blade.php ENDPATH**/ ?>