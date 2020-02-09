@extends('backend.layouts.base')

@section('content')
        <div class="layui-card-body" style="background-color: #fff;">
            <form class="layui-form" action="" method="post" id="layui-layer" lay-filter="component-form-element">
                <input type="hidden" name="id" value="{{$role->id??''}}">
                {{csrf_field()}}
                @widget('Text', [
                    'title'=>'角色标识',
                    'type'=>'text',
                    'name'=>'name',
                    'value'=>$role->name??'',
                    'placeholder'=>'请输入角色标识',
                    'verify'=>'required'
                ])
                @widget('Text', [
                    'title'=>'角色名称',
                    'type'=>'text',
                    'name'=>'display_name',
                    'value'=>$role->display_name??'',
                    'placeholder'=>'请输入角色名称',
                    'verify'=>'required'
                ])
                @widget('Text', [
                    'title'=>'排序',
                    'type'=>'text',
                    'name'=>'sort',
                    'value'=>$role->sort??'',
                    'placeholder'=>'请输入排序',
                ])
                @widget('Submit', [
                    'id'=>'LAY-user-backend-submit',
                    'value'=>'确认',
                    'filter'=>'LAY-user-backend-submit',
                    'hide'=>'',
                ])
            </form>
@endsection


