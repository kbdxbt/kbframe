@extends('backend.layouts.base')

@section('content')
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-block">
                            <input type="text" id="username" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">手机号</label>
                        <div class="layui-input-block">
                            <input type="text" id="mobile" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">角色</label>
                        <div class="layui-input-block">
                            <select id="role">
                                <option value="">请选择角色</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button id="search" class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="LAY-user-front-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">
                <div style="padding-bottom: 10px;">
                    @allow('backend.user.create')
                        <button class="layui-btn" data-type="add">添加</button>
                    @endallow
                    <button class="layui-btn" id="export">导出</button>
                    @allow('backend.user.destroy')
                        <button class="layui-btn layui-btn-danger" data-type="delAll">删除</button>
                    @endallow
                </div>

                <table id="dataTable" lay-filter="dataTable"></table>
            </div>
        </div>
    </div>
    <script type="text/html" id="barDemo">
        @allow('backend.user.edit')
            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        @endallow
        @allow('backend.user.destroy')
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        @endallow
    </script>
@endsection

@section('script')
    <script>
        function show_img(t) {
            var height = $("#displayimg").height();
            var width = $("#displayimg").width();
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: true,
                area: [width + 'px', height + 'px'], //宽高
                content: "<img alt=" + name + " title=" + name + " src=" + $(t).attr('src') + " />"
            });
        }

        layui.config({
            base: '/static/layui/' //静态资源所在路径
        }).use(['table'], function(){
            var layer = layui.layer;
            var form = layui.form;
            var table = layui.table;

            var username = $('#username').val();
            var mobile = $('#mobile').val();
            var role = $('#role').val();
            layer.load(1);
            //用户表格初始化
            var dataTable = table.render({
                elem: '#dataTable'
                ,id: 'backendUser'
                ,url: "{{ route('backend.user.list') }}" //数据接口
                ,where: {
                    'username': username,
                    'mobile': mobile,
                    'role': role
                }
                ,loading: true
                ,page: true //开启分页
                ,limit: 15
                ,limits: [15,30,50,100]
                ,cols: [[ //表头
                    {checkbox: true,fixed: true}
                    ,{field: 'id', title: 'ID', sort: true,width:80}
                    ,{field: 'head_portrait', title: '头像', templet:function (d) {
                        return '<div><img onclick="show_img(this)" src="' + d.head_portrait + '" style="display: inline-block; width: 50%; height: 100%;"></div>';
                    }}
                    ,{field: 'username', title: '账号'}
                    ,{field: 'nickname', title: '用户名'}
                    ,{field: 'role', title: '角色', templet:function (d) {
                        return d.role ? d.role.name : '';
                    }}
                    ,{field: 'gender_value', title: '性别'}
                    ,{field: 'mobile', title: '手机号'}
                    ,{field: 'email', title: '邮箱'}
                    ,{field: 'status_value', title: '状态'}
                    ,{field: 'created_at', title: '创建时间'}
                    ,{field: 'updated_at', title: '更新时间'}
                    ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
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
                    layer.confirm('确定删除选中的用户？', {icon: 3, title: '提示信息'}, function(index) {
                        var dataId = [];
                        dataId.push(data.id);
                        $.ajax({
                            url: '/backend/user/destroy',
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
                        title: '修改用户',
                        content: '/backend/user/'+data.id+'/edit',
                        maxmin: true,
                        area: ['500px', '742px'],
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index],
                                submitID = 'LAY-user-backend-submit',
                                submit = layero.find('iframe').contents().find('#'+ submitID);

                            {{--//监听提交--}}
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                var field = data.field; //获取提交的字段
                                //提交 Ajax 成功后，静态更新表格中的数据
                                $.ajax({
                                    url: '/backend/user/'+field.id+'/update',
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
                var username = $('#username').val();
                var mobile = $('#mobile').val();
                var role = $('#role').val();
                table.reload('backendUser', {
                    method: 'get'
                    ,where: {
                        'username': username,
                        'mobile': mobile,
                        'role': role
                    }
                });
            });

            //事件
            var active = {
                add: function(){
                    layer.open({
                        type: 2,
                        title: '添加用户',
                        content: '/backend/user/create',
                        maxmin: true,
                        area: ['500px', '742px'],
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index],
                                submitID = 'LAY-user-backend-submit',
                                submit = layero.find('iframe').contents().find('#'+ submitID);

                            {{--//监听提交--}}
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                var field = data.field; //获取提交的字段
                                //提交 Ajax 成功后，静态更新表格中的数据
                                $.ajax({
                                    url: '/backend/user/store',
                                    data: $(layero).find("iframe").contents().find("#layui-layer").serialize(),
                                    type: "POST",
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
                    var checkList = table.checkStatus('backendUser');
                        data = checkList.data,
                        dataId = [];
                    if(data.length > 0) {
                        for (var i in data) {
                            dataId.push(data[i].id);
                        }
                        layer.confirm('确定删除选中的用户？', {icon: 3, title: '提示信息'}, function (index) {
                            $.ajax({
                                url: '/backend/user/destroy',
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
                },
            };

            $('.layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] && active[type].call(this);
            });

            $('#export').on('click', function(){
                window.open("/backend/user/export");
            });
        })
    </script>
@endsection



