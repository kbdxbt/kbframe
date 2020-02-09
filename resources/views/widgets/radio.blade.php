<div class="layui-form-item" pane="">
    <label class="layui-form-label">{{$config['title']}}</label>
    <div class="layui-input-block">
        @foreach($config['data'] as $key => $val)
            <input type="radio" name="{{$config['name']}}" value={{$val}} title={{$key}} {{$config['value']==$val?"checked":""}}>
        @endforeach
    </div>
</div>
