@extends('backend.layouts.base')

@section('content')
    <div class="layui-fluid" id="component-tabs">
        <div class="layui-row">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <form action="" method="post" class="layui-form">
                        <div class="layui-tab layui-tab-brief" lay-filter="component-tabs-brief">
                            <ul class="layui-tab-title">
                                @foreach($groups as $key => $group)
                                    <li {{$key==$group_id?'class=layui-this':""}}>{{$group}}</li>
                                @endforeach
                            </ul>
                            <div class="layui-tab-content">
                                {{csrf_field()}}
                                @foreach($groups as $key => $group)
                                    <div class="layui-tab-item{{$key==$group_id?' layui-show':""}}">
                                        @if ($key == 1)
                                            @widget('Text', [
                                                'title' => '网站标题',
                                                'name'=>'config[web_site_title]',
                                                'value'=>$config['web_site_title'],
                                                'placeholder'=>'请输入网站标题'
                                            ])
                                            @widget('Picture', [
                                                'id'=>'upload-web-logo',
                                                'uuid'=>'web-logo',
                                                'title'=>'网站logo',
                                                'key'=>'上传图片',
                                                'name'=>'config[web_logo]',
                                                'value'=>$config['web_logo'],
                                            ])
                                            @widget('TextArea', [
                                                'title' => '网站描述',
                                                'name'=>'config[web_site_describe]',
                                                'value'=>$config['web_site_describe'],
                                            ])
                                            @widget('Text', [
                                                'title' => '版权所有',
                                                'name'=>'config[web_copyright]',
                                                'value'=>$config['web_copyright'],
                                                'placeholder'=>'版权所有'
                                            ])
                                            @widget('Text', [
                                                'title' => '备案号',
                                                'name'=>'config[web_site_icp]',
                                                'value'=>$config['web_site_icp'],
                                                'placeholder'=>'请输入备案号'
                                            ])
                                            @widget('TextArea', [
                                                'title' => '站点统计',
                                                'name'=>'config[web_visit_code]',
                                                'value'=>$config['web_visit_code'],
                                            ])
                                            <div class="layui-form-item">
                                            </div>
                                        @elseif ($key == 2)
                                            @widget('Radio', [
                                                'title'=>'水印状态',
                                                'name'=>'config[sys_image_watermark_status]',
                                                'data'=>[
                                                    '启用'=>'1',
                                                    '禁用'=>'0'
                                                ],
                                                'value'=>$config['sys_image_watermark_status'],
                                            ])
                                            @widget('Picture', [
                                                'id'=>'upload-head-portrait',
                                                'title'=>'水印图片',
                                                'key'=>'上传图片',
                                                'name'=>'config[sys_image_watermark_img]',
                                                'value'=>$config['sys_image_watermark_img'],
                                            ])
                                            @widget('Select', [
                                                'title'=>'水印位置',
                                                'name'=>'config[sys_image_watermark_location]',
                                                'data'=>[
                                                    '请选择一个位置'=>'',
                                                    '左上'=>'1',
                                                    '上中'=>'2',
                                                    '右上'=>'3',
                                                    '左中'=>'4',
                                                    '正中'=>'5',
                                                    '右中'=>'6',
                                                    '左下'=>'7',
                                                    '中下'=>'8',
                                                    '右下'=>'9'
                                                ],
                                                'value'=>$config['sys_image_watermark_location'],
                                            ])
                                            @widget('UEditor', [
                                                'id'=>'container',
                                                'name'=>'config[web_test_editor]',
                                                'title'=>'编辑测试',
                                                'content'=>$config['web_test_editor'],
                                            ])
                                            <style>
                                                #container {
                                                    margin-left: 110px;
                                                    margin-top: -50px;
                                                }
                                            </style>
                                        @else
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" type="submit" id="config_save">保存</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
       layui.config({
           base: '/static/layui/' //静态资源所在路径
       }).use(['index', 'upload', 'form'], function(){
           var $ = layui.$
               ,admin = layui.admin
               ,element = layui.element
               ,upload = layui.upload
               ,router = layui.router();

               element.render();

               element.on('tab(component-tabs-brief)', function(obj){
               });
               $("form").on("submit",function(event){
                   event.preventDefault();
                   $.ajax({
                       url: '/backend/config/save',
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

           //普通图片上传
           var uploadInst = upload.render({
               elem: '#upload-web-logo'
               ,url: '/backend/upload/images'
               ,before: function(obj){
                   //预读本地文件示例，不支持ie8
                   obj.preview(function(index, file, result){
                       $('#web-logo').attr('src', result).css('width', '100px').css('height', '100px').css('display', 'block'); //图片链接（base64）
                   });
               }
               ,done: function(res){
                   //如果上传失败
                   if(res.code == 0){
                       $("input[name='config[web_logo]']").val(res.data.url);
                       return layer.msg('上传成功', {time: 1000});
                   } else {
                       return layer.msg('上传失败', {time: 1000});
                   }
                   //上传成功
               }
               ,error: function(){
                   //演示失败状态，并实现重传
                   var demoText = $('#test-upload-demoText');
                   demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                   demoText.find('.demo-reload').on('click', function(){
                       uploadInst.upload();
                   });
               }
           });
       });
   </script>
@endsection


