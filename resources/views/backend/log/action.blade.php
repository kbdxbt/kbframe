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
                        <button id="search" class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="LAY-user-front-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">

                <table id="dataTable" lay-filter="dataTable"></table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        layui.config({
            base: '/static/layui/' //静态资源所在路径
        }).use(['table'], function(){
            var layer = layui.layer;
            var form = layui.form;
            var table = layui.table;

            var title = $('#title').val();
            layer.load(1);
            //用户表格初始化
            var dataTable = table.render({
                elem: '#dataTable'
                ,id: 'backendActionLog'
                ,url: "{{ route('backend.log.actionList') }}" //数据接口
                ,method: 'get'
                ,where: {
                    'title': title,
                }
                ,page: true //开启分页
                ,limit: 15
                ,limits: [15,30,50,100]
                ,cols: [[ //表头
                    {checkbox: true,fixed: true}
                    ,{field: 'id', title: 'ID', sort: true,width:80}
                    ,{field: 'username', title: '用户名', width:80}
                    ,{field: 'type', title: '类型'}
                    ,{field: 'group', title: '分组'}
                    ,{field: 'url', title: '访问地址'}
                    ,{field: 'remark', title: '备注'}
                    ,{field: 'params', title: '参数'}
                    ,{field: 'ip', title: 'ip'}
                    ,{field: 'created_at', title: '创建时间'}
                ]]
                , done: function(){
                    layer.closeAll('loading');
                }
            });

            // 执行搜索，表格重载
            $('#search').on('click', function () {
                // 搜索条件
                var username = $('#username').val();
                table.reload('backendActionLog', {
                    method: 'get'
                    ,where: {
                        'username': username,
                    }
                });
            });
        })
    </script>
@endsection



