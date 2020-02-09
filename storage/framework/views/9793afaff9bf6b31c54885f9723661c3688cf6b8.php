<?php $__env->startSection('content'); ?>
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">角色名称</label>
                        <div class="layui-input-block">
                            <input type="text" id="display_name" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button id="search" class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="LAY-user-front-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                    <div class="layui-inline" style="float:right;">
                        <?php if (\Illuminate\Support\Facades\Blade::check('allow', 'backend.role.create')): ?>
                            <button class="layui-btn" data-type="add">添加</button>
                        <?php endif; ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('allow', 'backend.role.destroy')): ?>
                            <button class="layui-btn layui-btn-danger" data-type="delAll">删除</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">
                <table id="dataTable" lay-filter="dataTable"></table>
            </div>
        </div>
    </div>
    <script type="text/html" id="barDemo">
        <?php if (\Illuminate\Support\Facades\Blade::check('allow', 'backend.role.edit')): ?>
            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">编辑</a>
        <?php endif; ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('allow', 'backend.role.permission')): ?>
            <a class="layui-btn layui-btn-xs" lay-event="permission">权限</a>
        <?php endif; ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('allow', 'backend.role.destroy')): ?>
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        layui.config({
            base: '/static/layui/' //静态资源所在路径
        }).use(['table'], function(){
            var layer = layui.layer;
            var form = layui.form;
            var table = layui.table;

            var display_name = $('#display_name').val();
            layer.load(1);
            //用户表格初始化
            var dataTable = table.render({
                elem: '#dataTable'
                ,url: "<?php echo e(route('backend.role.list')); ?>" //数据接口
                ,where: ""
                ,page: true //开启分页
                ,cols: [[ //表头
                    {checkbox: true,fixed: true}
                    ,{field: 'id', title: 'ID', sort: true,width:80}
                    ,{field: 'name', title: '角色组'}
                    ,{field: 'guard_name', title: '角色来源'}
                    ,{field: 'display_name', title: '角色名称'}
                    ,{field: 'sort', title: '排序'}
                    ,{field: 'created_at', title: '创建时间'}
                    ,{field: 'updated_at', title: '更新时间'}
                    ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:180}
                ]]
                , done: function(){
                    layer.closeAll('loading');
                }
            });

            //监听工具条
            table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                var data = obj.data //获得当前行数据
                    ,layEvent = obj.event; //获得 lay-event 对应的值
                if(layEvent === 'del'){
                    layer.confirm('确定删除选中的角色？', {icon: 3, title: '提示信息'}, function(index) {
                        var dataId = [];
                        dataId.push(data.id);
                        $.ajax({
                            url: '/backend/role/destroy',
                            type: "DELETE",
                            data: {ids:dataId},
                            dataType:"json",
                            beforeSend: function() {
                                layer.load(1);
                            },
                            success:function(res){
                                layer.closeAll('loading');
                                if (res.code != 0) {
                                    layer.msg('错误:'+res.msg, {icon: 2});
                                } else {
                                    layer.close(index); //关闭弹层
                                    dataTable.reload(); //数据刷新
                                    layer.msg('成功', {icon: 1,time: 1000});
                                }
                            },
                            error:function(data){
                                layer.closeAll('loading');
                                layer.msg('服务器网络错误', {icon: 2});
                            }
                        });
                    });
                } else if(layEvent === 'edit'){
                    layer.open({
                        type: 2,
                        title: '修改角色',
                        content: '/backend/role/'+data.id+'/edit',
                        maxmin: true,
                        area: ['500px', '708px'],
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index],
                                submitID = 'LAY-user-backend-submit',
                                submit = layero.find('iframe').contents().find('#'+ submitID);

                            
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                var field = data.field; //获取提交的字段
                                //提交 Ajax 成功后，静态更新表格中的数据
                                $.ajax({
                                    url: '/backend/role/'+field.id+'/update',
                                    data: $(layero).find("iframe").contents().find("#layui-layer").serialize(),
                                    type: "PUT",
                                    dataType:"json",
                                    beforeSend: function() {
                                        layer.load(1);
                                    },
                                    success:function(res){
                                        layer.closeAll('loading');
                                        if (res.code != 0) {
                                            layer.msg('错误:'+res.msg, {icon: 2});
                                        } else {
                                            layer.close(index); //关闭弹层
                                            dataTable.reload(); //数据刷新
                                            layer.msg('成功', {icon: 1,time: 1000});
                                        }
                                    },
                                    error:function(data){
                                        layer.closeAll('loading');
                                        layer.msg('服务器网络错误', {icon: 2});
                                    }
                                });
                            });
                            submit.trigger('click');
                        }
                    });
                } else if(layEvent === 'permission'){
                    layer.open({
                        type: 2,
                        title: '角色权限',
                        content: '/backend/role/'+data.id+'/permission',
                        maxmin: true,
                        area: ['900px', '800px'],
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index],
                                submitID = 'LAY-user-backend-submit',
                                submit = layero.find('iframe').contents().find('#'+ submitID);

                            
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(val){
                                var field = val.field; //获取提交的字段
                                //提交 Ajax 成功后，静态更新表格中的数据
                                $.ajax({
                                    url: '/backend/role/'+data.id+'/assignPermission',
                                    data: $(layero).find("iframe").contents().find("#layui-layer").serialize(),
                                    type: "PUT",
                                    dataType:"json",
                                    beforeSend: function() {
                                        layer.load(1);
                                    },
                                    success:function(res){
                                        layer.closeAll('loading');
                                        if (res.code != 0) {
                                            layer.msg('错误:'+res.msg, {icon: 2});
                                        } else {
                                            layer.close(index); //关闭弹层
                                            dataTable.reload(); //数据刷新
                                            layer.msg('成功', {icon: 1,time: 1000});
                                        }
                                    },
                                    error:function(data){
                                        layer.closeAll('loading');
                                        layer.msg('服务器网络错误', {icon: 2});
                                    }
                                });
                            });
                            submit.trigger('click');
                        }
                    });
                }
            });

            // 执行搜索，表格重载
            $('#search').on('click', function () {
                // 搜索条件
                var display_name = $('#display_name').val();
                table.reload('dataTable', {
                    method: 'get'
                    ,where: {
                        'displayName': display_name,
                    }
                });
            });

            //事件
            var active = {
                add: function(){
                    layer.open({
                        type: 2,
                        title: '添加角色',
                        content: '/backend/role/create',
                        maxmin: true,
                        area: ['500px', '708px'],
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index],
                                submitID = 'LAY-user-backend-submit',
                                submit = layero.find('iframe').contents().find('#'+ submitID);

                            
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                var field = data.field; //获取提交的字段
                                //提交 Ajax 成功后，静态更新表格中的数据
                                $.ajax({
                                    url: '/backend/role/0/update',
                                    data: $(layero).find("iframe").contents().find("#layui-layer").serialize(),
                                    type: "PUT",
                                    dataType:"json",
                                    beforeSend: function() {
                                        layer.load(1);
                                    },
                                    success:function(res){
                                        layer.closeAll('loading');
                                        if (res.code != 0) {
                                            layer.msg('错误:'+res.msg, {icon: 2});
                                        } else {
                                            layer.close(index); //关闭弹层
                                            dataTable.reload(); //数据刷新
                                            layer.msg('成功', {icon: 1,time: 1000});
                                        }
                                    },
                                    error:function(data){
                                        layer.closeAll('loading');
                                        layer.msg('服务器网络错误', {icon: 2});
                                    }
                                });
                            });
                            submit.trigger('click');
                        }
                    });
                },
                delAll: function () {
                    var checkList = table.checkStatus('dataTable');
                    data = checkList.data,
                        dataId = [];
                    if(data.length > 0) {
                        for (var i in data) {
                            dataId.push(data[i].id);
                        }
                        layer.confirm('确定删除选中的角色？', {icon: 3, title: '提示信息'}, function (index) {
                            $.ajax({
                                url: '/backend/role/destroy',
                                type: "DELETE",
                                data: {ids:dataId},
                                dataType:"json",
                                beforeSend: function() {
                                    layer.load(1);
                                },
                                success:function(res){
                                    layer.closeAll('loading');
                                    if (res.code != 0) {
                                        layer.msg('错误:'+res.msg, {icon: 2});
                                    } else {
                                        layer.close(index); //关闭弹层
                                        dataTable.reload(); //数据刷新
                                        layer.msg('成功', {icon: 1,time: 1000});
                                    }
                                },
                                error:function(data){
                                    layer.closeAll('loading');
                                    layer.msg('服务器网络错误', {icon: 2});
                                }
                            });
                        })
                    }else{
                        layer.msg("请选择需要删除的用户");
                    }
                }
            };

            $('.layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] && active[type].call(this);
            });
        })
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/role/index.blade.php ENDPATH**/ ?>