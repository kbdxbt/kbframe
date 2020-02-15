<div class="layui-form-item">
    <label for="" class="layui-form-label">{{$config['title']}}</label>
</div>
<script id="{{$config['id']}}" name="{{$config['name']}}" type="text/plain"></script>
@include('vendor.ueditor.assets')
<script type="text/javascript">
    var ue = UE.getEditor('container', {
        autoHeight: false
    });
    ue.ready(function() {
        ue.setContent('{{$config['content']??''}}');
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
