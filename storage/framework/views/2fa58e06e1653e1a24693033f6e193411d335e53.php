<?php $__env->startSection('content'); ?>
    <style>
        .cate-box{margin-bottom: 15px;padding-bottom:10px;border-bottom: 1px solid #f0f0f0}
        .cate-box dt{margin-bottom: 10px;}
        .cate-box dt .cate-first{padding:10px 20px}
        .cate-box dd{padding:0 50px}
        .cate-box dd .cate-second{margin-bottom: 10px}
        .cate-box dd .cate-third{padding:0 40px;margin-bottom: 10px}
    </style>
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
        </div>
        <div class="layui-card-body">
            <form action="" method="post" class="layui-form" id="layui-layer" lay-filter="component-form-element">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('put')); ?>

                <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $first): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <dl class="cate-box">
                        <dt>
                        <div class="cate-first"><input id="menu<?php echo e($first['id']); ?>" type="checkbox" name="permissions[]" value="<?php echo e($first['id']); ?>" title="<?php echo e($first['display_name']); ?>" lay-skin="primary" <?php echo e($first['own']??''); ?> ></div>
                        </dt>
                        <?php if(isset($first['_child'])): ?>
                            <?php $__currentLoopData = $first['_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $second): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <dd>
                                    <div class="cate-second"><input id="menu<?php echo e($first['id']); ?>-<?php echo e($second['id']); ?>" type="checkbox" name="permissions[]" value="<?php echo e($second['id']); ?>" title="<?php echo e($second['display_name']); ?>" lay-skin="primary" <?php echo e($second['own']??''); ?>></div>
                                    <?php if(isset($second['_child'])): ?>
                                        <div class="cate-third">
                                            <?php $__currentLoopData = $second['_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input type="checkbox" id="menu<?php echo e($first['id']); ?>-<?php echo e($second['id']); ?>-<?php echo e($thild['id']); ?>" name="permissions[]" value="<?php echo e($thild['id']); ?>" title="<?php echo e($thild['display_name']); ?>" lay-skin="primary" <?php echo e($thild['own']??''); ?>>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </dd>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </dl>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="text-align: center;padding:20px 0;">
                        无数据
                    </div>
                <?php endif; ?>
                <div class="layui-form-item layui-hide">
                    <input type="button" lay-submit lay-filter="LAY-user-backend-submit" id="LAY-user-backend-submit" value="确认">
                </div>

            </form>
        </div>
    </div>
    <script>
        layui.use(['form'], function(){
            var form = layui.form;

            form.on('checkbox', function (data) {
                var check = data.elem.checked;//是否选中
                var checkId = data.elem.id;//当前操作的选项框
                if ($(this).is(':checked') == true) {
                    //选中
                    var ids = checkId.split("-");
                    if (ids.length == 3) {
                        //第三极菜单选中,则他的上级选中
                        $("#" + (ids[0] + '-' + ids[1])).prop("checked", true);
                        $("#" + (ids[0])).prop("checked", true);
                    } else if (ids.length == 2) {
                        //第二季菜单
                        $("#" + (ids[0])).prop("checked", true);
                        $("input[id*=" + ids[0] + '-' + ids[1] + "]").each(function (i, ele) {
                            $(ele).prop("checked", true);
                        });
                    } else {
                        //第一季菜单不需要做处理
                        $("input[id*=" + ids[0] + "-]").each(function (i, ele) {
                            $(ele).prop("checked", true);
                        });
                    }
                } else {
                    //取消选中
                    var ids = checkId.split("-");
                    if (ids.length == 3) {
                        var check1 = true
                            check2 = true;
                        $("input[id*=" + ids[0] + '-' + ids[1] + '-'+"]").each(function (i, ele) {
                            if ($(ele).is(':checked') == true) {
                                check2 = false;
                            }
                        });
                        if (check2) {
                            $("#" + (ids[0] + '-' + ids[1])).prop("checked", false);
                        }
                        $("input[id*=" + ids[0] + '-' +"]").each(function (i, ele) {
                            if ($(ele).is(':checked') == true) {
                                check1 = false;
                            }
                        });
                        if (check1) {
                            $("#" + (ids[0])).prop("checked", false);
                        }
                    } else if (ids.length == 2) {
                        //第二级菜单
                        $("input[id*=" + ids[0] + '-' + ids[1] + "]").each(function (i, ele) {
                            $(ele).prop("checked", false);
                        });
                        var check1 = true;
                        $("input[id*=" + ids[0] + '-' +"]").each(function (i, ele) {
                            if ($(ele).is(':checked') == true) {
                                check1 = false;
                            }
                        });
                        if (check1) {
                            $("#" + (ids[0])).prop("checked", false);
                        }
                    } else if (ids.length == 1) {
                        $("input[id*=" + ids[0] + "-]").each(function (i, ele) {
                            $(ele).prop("checked", false);
                        });
                    }
                }
                form.render();
            });
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/role/permission.blade.php ENDPATH**/ ?>