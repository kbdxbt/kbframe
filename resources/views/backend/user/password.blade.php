@extends('backend.layouts.base')

@section('content')
    <div class="layui-card-body" style="background-color: #fff;">
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">修改密码</div>
                        <div class="layui-card-body" pad15>
                            <form action="" method="post" class="layui-form">
                            <div class="layui-form" lay-filter="">
                                {{csrf_field()}}
                                @widget('Text', [
                                    'title'=>'当前密码',
                                    'type'=>'password',
                                    'name'=>'oldPassword',
                                    'value'=>'',
                                    'placeholder'=>'请输入当前密码',
                                    'verify'=>'required'
                                ])
                                @widget('Text', [
                                    'title'=>'新密码',
                                    'type'=>'password',
                                    'name'=>'password',
                                    'value'=>'',
                                    'placeholder'=>'请输入新密码',
                                    'verify'=>'required'
                                ])
                                @widget('Text', [
                                    'title'=>'确认新密码',
                                    'type'=>'password',
                                    'name'=>'rePassword',
                                    'value'=>'',
                                    'placeholder'=>'请输入新密码',
                                    'verify'=>'required'
                                ])
                            </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" type="submit">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        layui.use(['index', 'form'], function(){
            var $ = layui.$;

            $("form").on("submit",function(event){
                event.preventDefault();
                $.ajax({
                    url: '/backend/user/password',
                    type: "POST",
                    data: $("form").serialize(),
                    dataType:"json",
                    beforeSend: function() {
                        layer.load(1);
                    },
                    success:function(res){
                        layer.closeAll('loading');
                        if (res.code != 0) {
                            layer.msg('错误:'+res.msg, {icon: 2});
                        } else {
                            layer.msg('成功', {icon: 1,time: 1000});
                        }
                    },
                    error:function(data){
                        layer.closeAll('loading');
                        layer.msg('服务器网络错误', {icon: 2});
                    }
                });
            })
        });
    </script>
@endsection



