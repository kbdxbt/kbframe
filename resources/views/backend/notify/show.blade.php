@extends('backend.layouts.base')

@section('content')
    <div class="layui-fluid" id="LAY-app-message-detail">
        <div class="layui-card layuiAdmin-msg-detail">
            <div class="layui-card-header">
                <h1>{{$notify->title}}</h1>
                <p>
                    <span>{{$notify->created_at}}</span>
                </p>
            </div>
            <div class="layui-card-body layui-text">
                <div class="layadmin-text">
                    {{$notify->content}}
                </div>
            </div>
        </div>
    </div>
@endsection
