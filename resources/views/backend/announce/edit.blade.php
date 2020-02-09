@extends('backend.layouts.base')

@section('content')
    <div class="layui-card-body" style="background-color: #fff;">
        <form class="layui-form" action="" method="post" id="layui-layer" lay-filter="component-form-element">
            <input type="hidden" name="id" value="{{$announce->id??''}}">
            {{csrf_field()}}
            @widget('Text', [
                'title'=>'标题',
                'type'=>'text',
                'name'=>'title',
                'value'=>$announce->title??'',
                'placeholder'=>'请输入标题',
                'verify'=>'required'
            ])
            @widget('UEditor', [
                'id'=>'container',
                'name'=>'content',
                'title'=>'内容',
                'content'=>$announce->content??'',
            ])
            <style>
                #container {
                    margin-left: 110px;
                    margin-top: -50px;
                }
            </style>
            @widget('Submit', [
                'id'=>'LAY-user-backend-submit',
                'value'=>'确认',
                'filter'=>'LAY-user-backend-submit',
                'hide'=>'',
            ])
        </form>
    </div>
@endsection


