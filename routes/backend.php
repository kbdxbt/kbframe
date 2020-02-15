<?php
/**
 * Backend Routes
 * 后台公共路由部分
 */

Route::group(['namespace'=>'Backend','prefix'=>'backend'],function (){
    //登录、注销
    Route::get('login','LoginController@showLoginForm')->name('backend.loginForm');
    Route::post('login','LoginController@login')->name('backend.login');
    Route::get('logout','LoginController@logout')->name('backend.logout');
    Route::post('upload/images','UploadController@images');
    //测试组
    Route::get('example/rbmq-direct','ExampleController@rbmqDirect');
    Route::get('example/rbmq-fanout','ExampleController@rbmqFanout');
    Route::get('example/rbmq-topic','ExampleController@rbmqTopic');

    Route::any('/example/{action}', function($action) {
        $ctrl = \App::make("\\App\\Http\\Controllers\\Backend\\ExampleController");
        return \App::call([$ctrl, $action]);
    });

    Route::any('/upload/{action}', function($action) {
        $ctrl = \App::make("\\App\\Http\\Controllers\\Backend\\UploadController");
        return \App::call([$ctrl, $action]);
    });
});

Route::group(['namespace'=>'Backend','prefix'=>'backend','middleware'=>['auth']],function () {
    //后台布局
    Route::get('/','IndexController@layout')->name('backend.layout');
    //后台首页
    Route::get('/index','IndexController@index')->name('backend.index');
    Route::get('/info','IndexController@info')->name('backend.info');
});

/**
 * 后台用户管理权限模块组
 */
Route::group(['namespace'=>'Backend','prefix'=>'backend','middleware'=>['auth']],function (){

    $groups = ['user', 'role', 'permission', 'announce'];

    foreach ($groups as $group) {
        $group_key = ucfirst($group);
        Route::get($group, $group_key.'Controller@index')->name('backend.'.$group)->middleware('backend.permission:backend.'.$group);
        Route::get($group.'/list', $group_key.'Controller@list')->name('backend.'.$group.'.list')->middleware('backend.permission:backend.'.$group);
        //添加
        Route::get($group.'/create', $group_key.'Controller@create')->name('backend.'.$group.'.create')->middleware('backend.permission:backend.'.$group.'.create');
        Route::post($group.'/store', $group_key.'Controller@store')->name('backend.'.$group.'.store')->middleware('backend.permission:backend.'.$group.'.create');
        //编辑
        Route::get($group.'/{id}/edit', $group_key.'Controller@edit')->name('backend.'.$group.'.edit')->middleware('backend.permission:backend'.$group.'.edit');
        Route::put($group.'/{id}/update', $group_key.'Controller@update')->name('backend.'.$group.'.update')->middleware('backend.permission:backend'.$group.'.edit');
        //删除
        Route::delete($group.'/destroy', $group_key.'Controller@destroy')->name('backend.'.$group.'.destroy')->middleware('backend.permission:backend.'.$group.'.destroy');
    }

    Route::match(['get', 'post'], 'user/personal','UserController@personal')->name('backend.user.personal');
    Route::match(['get', 'post'], 'user/password','UserController@password')->name('backend.user.password');

    Route::get('role/{id}/permission','RoleController@permission')->name('backend.role.permission')->middleware('backend.permission:backend.role.permission');
    Route::put('role/{id}/assignPermission','RoleController@assignPermission')->name('backend.role.assignPermission')->middleware('backend.permission:backend.role.permission');

    Route::get('icon/list','IconController@list')->name('backend.icon.list');

    Route::get('notify','NotifyController@index')->name('backend.notify');
    Route::get('notify/list','NotifyController@list')->name('backend.notify.list');
    Route::get('notify/{id}/show','NotifyController@show')->name('backend.notify.show');
    Route::post('notify/read','NotifyController@read')->name('backend.notify.read');

    Route::get('config','ConfigController@index')->name('backend.config')->middleware('backend.permission:backend.config');
    Route::post('config/save','ConfigController@save')->name('backend.config.save')->middleware('backend.permission:backend.config');

    Route::get('user/esList','UserController@esList')->name('backend.user.esList')->middleware('backend.permission:backend.user');
    Route::get('user/export','UserController@export')->name('backend.user.export')->middleware('backend.permission:backend.user');

    Route::get('log/action','LogController@action')->name('backend.log.action')->middleware('backend.permission:backend.log.action');
    Route::get('log/actionList','LogController@actionList')->name('backend.log.actionList')->middleware('backend.permission:backend.log.action');
});
