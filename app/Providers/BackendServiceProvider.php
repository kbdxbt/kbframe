<?php

namespace App\Providers;

use App\Services\NotifyService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class BackendServiceProvider 后台服务提供者
 * @package App\Providers
 * @author kbdxbt <1194174530@qq.com>
 */
class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //左侧菜单
        view()->composer('backend.layouts.layout',function($view){
            $menus = \App\Models\Permission::with([
                'childs'=>function($query){
                    $query->with('icon');
                }
                ,'icon'])->where('parent_id',0)->orderBy('sort','desc')->get();
            // 拉取公告
            app(NotifyService::class)->pullAnnounce();
            // 获取未读消息
            $unreadMessage = \App\Models\NotifyRecord::where('is_read', 0)->where('user_id', user()->id)->count();

            $view->with('menus', $menus);
            $view->with('unreadMessage', $unreadMessage);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('allow', function ($permission) {
            $user = user();
            if (!$user->hasRole(config('permission.superAdminRole'))) {
                if (!$user->can($permission)) {
                    return false;
                }
            }
            return true;
        });
    }
}
