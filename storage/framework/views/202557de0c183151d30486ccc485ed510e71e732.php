<?php $__env->startSection('content'); ?>
    <div class="layui-card-body" style="background-color: #fff;">
        <form class="layui-form" action="" method="post" id="layui-layer" lay-filter="component-form-element">
            <input type="hidden" name="id" value="<?php echo e($permission->id); ?>">
            <?php echo e(csrf_field()); ?>

            <?php
                foreach ($permissions as $v) {
                    $array[$v['title_show']] = $v['id'];
                }
                $array = array_merge($array, ['顶级权限'=>0]);
            ?>
            <?php echo app('arrilot.widget')->run('Select', [
                'title'=>'父级',
                'name'=>'parent_id',
                'data'=>$array,
                'value'=>$permission->parent_id,
            ]); ?>
            <?php echo app('arrilot.widget')->run('Text', [
                'title'=>'权限标识',
                'type'=>'text',
                'name'=>'name',
                'value'=>$permission->name,
                'placeholder'=>'如：system.index'
            ]); ?>
            <?php echo app('arrilot.widget')->run('Text', [
                'title'=>'权限名称',
                'type'=>'text',
                'name'=>'display_name',
                'value'=>$permission->display_name,
                'placeholder'=>'如：系统管理',
                'verify'=>'required'
            ]); ?>
            <?php echo app('arrilot.widget')->run('Text', [
                'title'=>'路由',
                'type'=>'text',
                'name'=>'route',
                'value'=>$permission->route,
                'placeholder'=>'如：backend.user'
            ]); ?>
            <?php echo app('arrilot.widget')->run('Text', [
                'title'=>'排序',
                'type'=>'text',
                'name'=>'sort',
                'value'=>$permission->sort,
                'placeholder'=>'请输入排序'
            ]); ?>
            <div class="layui-form-item">
                <label for="" class="layui-form-label">图标</label>
                <div class="layui-input-inline">
                    <input class="layui-input" type="hidden" name="icon_id" value="<?php echo e($permission->icon_id); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux" id="icon_box">
                    <i class="layui-icon <?php echo e($permission->icon->class??''); ?>"></i> <?php echo e($permission->icon->name??''); ?>

                </div>
                <div class="layui-form-mid layui-word-aux">
                    <button type="button" class="layui-btn layui-btn-xs" onclick="showIconsBox()">选择图标</button>
                </div>
            </div>
            <div class="layui-form-item layui-hide">
                <input type="button" lay-submit lay-filter="LAY-user-backend-submit" id="LAY-user-backend-submit" value="确认">
            </div>
        </form>
        <style>
            /*图标展示*/
            .site-doc-icon{width: 480px;background-color: #fff}
            .site-doc-icon li{cursor:pointer;display: inline-block; vertical-align: middle; width: 95px; height: 50px; line-height: 25px; padding: 20px 0; margin-right: -1px; margin-bottom: -1px; border: 1px solid #e2e2e2; font-size: 14px; text-align: center; color: #666; transition: all .3s; -webkit-transition: all .3s;}
            .site-doc-anim li{height: auto;}
            .site-doc-icon li .layui-icon{display: inline-block; font-size: 25px;}
            .site-doc-icon li .doc-icon-name,
            .site-doc-icon li .doc-icon-code{color: #c2c2c2;}
            .site-doc-icon li .doc-icon-code xmp{margin:0}
            .site-doc-icon li .doc-icon-fontclass{height: 40px; line-height: 20px; padding: 0 5px; font-size: 13px; color: #333; }
            .site-doc-icon li:hover{background-color: #f2f2f2; color: #000;}

        </style>
            <script>
                //选择图标
                function chioceIcon(obj) {
                    var icon_id = $(obj).data('id');
                    $("input[name='icon_id']").val(icon_id);
                    $("#icon_box").html('<i class="layui-icon '+$(obj).data('class')+'"></i> '+$(obj).data('name'));
                    layer.closeAll();
                }

                //弹出图标
                function showIconsBox() {
                    var index = layer.load();
                    $.get("<?php echo e(route('backend.icon.list')); ?>",function (res) {
                        layer.close(index);
                        if (res.code==0 && res.data.length>0){
                            var html = '<ul class="site-doc-icon">';
                            $.each(res.data,function (index,item) {
                                html += '<li onclick="chioceIcon(this)" data-id="'+item.id+'" data-class="'+item.class+'" data-name="'+item.name+'" >';
                                html += '   <i class="layui-icon '+item.class+'"></i>';
                                html += '   <div class="doc-icon-name">'+item.name+'</div>';
                                html += '</li>'
                            });
                            html += '</ul>';
                            layer.open({
                                type:1,
                                title:'选择图标',
                                area : ['500px','400px'],
                                content:html
                            })
                        }else {
                            layer.msg(res.msg);
                        }
                    },'json')
                }
            </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/permission/edit.blade.php ENDPATH**/ ?>