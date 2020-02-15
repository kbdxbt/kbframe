<?php

namespace App\Http\Controllers\Backend;

use App\Events\BackendLoginEvent;
use App\Traits\ApiResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

/**
 * Class LoginController 登录控制器
 * @package App\Http\Controllers\Backend
 * @author kbdxbt <1194174530@qq.com>
 */
class LoginController extends BaseController
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3; //最多尝试次数

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 登录表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('backend.login.login');
    }

    public function attemptLogin(Request $request)
    {
        return collect(['username', 'email', 'mobile'])->contains(function ($value) use ($request) {
            $account = $request->get($this->username());
            $password = $request->get('password');
            if ($data = $this->guard()->attempt([$value => $account, 'password' => $password, 'status' => 1], $request->filled('remember'))) {
                event(new BackendLoginEvent(Auth::guard('backend')->user()));
            }
            return $data;
        });
    }


    /**
     * 用于登录的字段
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * 登录成功后的跳转地址
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectTo()
    {
        return route('backend.index');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect(route('backend.login'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $res = ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);

        $message = $this->analyErr($res->errors()[$this->username()]);

        return $this->error($message);
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        $res = ValidationException::withMessages([
            $this->username() => [Lang::get('auth.throttle', ['seconds' => $seconds])],
        ]);

        $message = $this->analyErr($res->errors()[$this->username()]);

        return $this->error($message);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->success();
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        //开启验证码
//        $this->validate($request, [
//            $this->username() => 'required|string',
//            'password' => 'required|string',
//            'captcha' => 'required_if|captcha',
//        ],[
//            'captcha.required' => ':attribute 不能为空',
//            'captcha.captcha' => '请输入正确的 :attribute',
//        ],[
//            $this->username() => '账号',
//            'captcha' => '验证码',
//        ]);
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],[
            $this->username() => '账号',
        ]);
    }
}
