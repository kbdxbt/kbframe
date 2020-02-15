<div class="layui-header">
    <!-- 头部区域 -->
    <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
        </li>
        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="/" target="_blank" title="前台">
                <i class="layui-icon layui-icon-website"></i>
            </a>
        </li>
        <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" layadmin-event="refresh" title="刷新">
                <i class="layui-icon layui-icon-refresh-3"></i>
            </a>
        </li>
        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="">
        </li>
    </ul>
    <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
        <li class="layui-nav-item" lay-unselect>
            <a lay-href="<?php echo e(substr(route('backend.notify','',false), 0, -1)); ?>" lay-attr="route('backend.notify')" layadmin-event="message" lay-text="消息管理">
                <i class="layui-icon layui-icon-notice"><?php if($unreadMessage): ?><span class="layui-badge"><?php echo e($unreadMessage); ?></span><?php endif; ?></i>
            </a>
        </li>
        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="theme">
                <i class="layui-icon layui-icon-theme"></i>
            </a>
        </li>
        <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;">
                <cite><?php echo e(user()->username); ?></cite>
            </a>
            <dl class="layui-nav-child">
                <dd><a lay-href="<?php echo e(route('backend.user.personal')); ?>">基本资料</a></dd>
                <dd><a lay-href="<?php echo e(route('backend.user.password')); ?>">修改密码</a></dd>
                <hr>
                <dd  style="text-align: center;"><a href="<?php echo e(route('backend.logout')); ?>">退出</a></dd>
            </dl>
        </li>
    </ul>
</div>
<?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/layouts/_header.blade.php ENDPATH**/ ?>