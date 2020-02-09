<?php $__env->startSection('content'); ?>
    <div class="layui-fluid" id="component-tabs">
        <div class="layui-row">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <form action="" method="post" class="layui-form">
                        <div class="layui-tab layui-tab-brief" lay-filter="component-tabs-brief">
                            <ul class="layui-tab-title">
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li <?php echo e($key==$group_id?'class=layui-this':""); ?>><?php echo e($group); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="layui-tab-content">
                                <?php echo e(csrf_field()); ?>

                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="layui-tab-item<?php echo e($key==$group_id?' layui-show':""); ?>">
                                        <?php if($key == 1): ?>
                                            <?php echo app('arrilot.widget')->run('Text', [
                                                'title' => '网站标题',
                                                'name'=>'config[web_site_title]',
                                                'value'=>$config['web_site_title'],
                                                'placeholder'=>'请输入网站标题'
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('Picture', [
                                                'id'=>'upload-web-logo',
                                                'uuid'=>'web-logo',
                                                'title'=>'网站logo',
                                                'key'=>'上传图片',
                                                'name'=>'config[web_logo]',
                                                'value'=>$config['web_logo'],
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('TextArea', [
                                                'title' => '网站描述',
                                                'name'=>'config[web_site_describe]',
                                                'value'=>$config['web_site_describe'],
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('Text', [
                                                'title' => '版权所有',
                                                'name'=>'config[web_copyright]',
                                                'value'=>$config['web_copyright'],
                                                'placeholder'=>'版权所有'
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('Text', [
                                                'title' => '备案号',
                                                'name'=>'config[web_site_icp]',
                                                'value'=>$config['web_site_icp'],
                                                'placeholder'=>'请输入备案号'
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('TextArea', [
                                                'title' => '站点统计',
                                                'name'=>'config[web_visit_code]',
                                                'value'=>$config['web_visit_code'],
                                            ]); ?>
                                            <div class="layui-form-item">
                                            </div>
                                        <?php elseif($key == 2): ?>
                                            <?php echo app('arrilot.widget')->run('Radio', [
                                                'title'=>'水印状态',
                                                'name'=>'config[sys_image_watermark_status]',
                                                'data'=>[
                                                    '启用'=>'1',
                                                    '禁用'=>'0'
                                                ],
                                                'value'=>$config['sys_image_watermark_status'],
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('Picture', [
                                                'id'=>'upload-head-portrait',
                                                'title'=>'水印图片',
                                                'key'=>'上传图片',
                                                'name'=>'config[sys_image_watermark_img]',
                                                'value'=>$config['sys_image_watermark_img'],
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('Select', [
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
                                            ]); ?>
                                            <?php echo app('arrilot.widget')->run('UEditor', [
                                                'id'=>'container',
                                                'name'=>'config[web_test_editor]',
                                                'title'=>'编辑测试',
                                                'content'=>$config['web_test_editor'],
                                            ]); ?>
                                            <style>
                                                #container {
                                                    margin-left: 110px;
                                                    margin-top: -50px;
                                                }
                                            </style>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpStudy_64\phpstudy_pro\WWW\www.kbframe.com\resources\views/backend/config/index.blade.php ENDPATH**/ ?>