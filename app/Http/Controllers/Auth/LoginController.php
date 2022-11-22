<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if (Auth::user()->role == '1' || Auth::user()->role == '2') {
            return redirect('admin/main')->with('status', 'Chào mừng quản trị viên!');
        } else if (Auth::user()->role == '0') {
            if (Auth::user()->status == '0') {
                Auth::logout();
                return  redirect('/login')->with('status', 'Tài khoản chưa được kích hoạt!');
            }
            return redirect('/home')->with('status', 'Đăng nhập thành công!');
        } else {
            return redirect('/');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
