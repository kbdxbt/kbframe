<div class="layui-form-item">
    <label for="" class="layui-form-label">{{$config['title']}}</label>
    <div class="layui-input-inline">
        <input id="{{$config['id']}}" type="{{$config['type']}}" name="{{$config['name']}}" value="{{$config['value']}}" placeholder="{{$config['placeholder']}}" {{$config['required']?"lay-verify=".$config['required']:""}} {{$config['verify']?"lay-verify=".$config['verify']:''}} autocomplete="off" class="layui-input">
    </div>
</div>
