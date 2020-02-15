<div class="layui-form-item">
    <label for="" class="layui-form-label">{{$config['title']}}</label>
    <div class="layui-input-inline">
        <select name="{{$config['name']}}">
            @foreach($config['data'] as $key => $val)
                <option value="{{$val}}" {{$val==$config["value"]?"selected":""}}>{!! $key !!}</option>
            @endforeach
        </select>
    </div>
</div>
