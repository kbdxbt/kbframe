<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="<?php echo e(route('backend.index')); ?>">
            <span>kbframe</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (\Illuminate\Support\Facades\Blade::check('allow', $menu->name)): ?>
                    <li data-name="<?php echo e($menu->id); ?>" class="layui-nav-item">
                        <a href="javascript:;" lay-tips="<?php echo e($menu->display_name); ?>" lay-direction="2">
                            <i class="layui-icon <?php echo e($menu->icon->class??''); ?>"></i>
                            <cite><?php echo e($menu->display_name); ?></cite>
                        </a>
                        <?php if($menu->childs->isNotEmpty()): ?>
                            <dl class="layui-nav-child">
                                <?php $__currentLoopData = $menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (\Illuminate\Support\Facades\Blade::check('allow', $subMenu->name)): ?>
                                        <dd data-name="<?php echo e($subMenu->name); ?>" >
                                            <a lay-href="<?php echo e(substr(route($subMenu->route,'',false), 0, -1)); ?>"><i class="layui-icon <?php echo e($subMenu->icon->class??''); ?>"></i><?php echo e($subMenu->display_name); ?></a>
                                        </dd>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </dl>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/layouts/_menu.blade.php ENDPATH**/ ?>