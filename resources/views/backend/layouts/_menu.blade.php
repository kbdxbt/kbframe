<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="{{route('backend.index')}}">
            <span>kbframe</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            @foreach($menus as $menu)
                @allow($menu->name)
                    <li data-name="{{$menu->id}}" class="layui-nav-item">
                        <a href="javascript:;" lay-tips="{{$menu->display_name}}" lay-direction="2">
                            <i class="layui-icon {{$menu->icon->class??''}}"></i>
                            <cite>{{$menu->display_name}}</cite>
                        </a>
                        @if($menu->childs->isNotEmpty())
                            <dl class="layui-nav-child">
                                @foreach($menu->childs as $subMenu)
                                    @allow($subMenu->name)
                                        <dd data-name="{{$subMenu->name}}" >
                                            <a lay-href="{{substr(route($subMenu->route,'',false), 0, -1)}}"><i class="layui-icon {{$subMenu->icon->class??''}}"></i>{{$subMenu->display_name}}</a>
                                        </dd>
                                    @endallow
                                @endforeach
                            </dl>
                        @endif
                    </li>
                @endallow
            @endforeach
        </ul>
    </div>
</div>
