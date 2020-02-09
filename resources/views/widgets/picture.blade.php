<div class="layui-form-item layui-col-lg6">
    <label class="layui-form-label">{{$config['title']}}</label>
    <button type="button" class="layui-btn" id="{{$config['id']}}">{{$config['key']}}</button>
    <div class="layui-upload-list">
        <img src="{{$config['value']}}" id="{{$config['uuid']}}" style="width:100px;height:100px;margin-left:110px;" class="layui-upload-img">
        <input type="hidden" name="{{$config['name']}}" value="{{$config['value']}}" class="layui-input">
    </div>
</div>
