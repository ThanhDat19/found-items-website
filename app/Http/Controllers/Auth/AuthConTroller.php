<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use Mail;
use Str;

class AuthConTroller extends Controller
{
    #Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);
        try {
            $token = strtoupper(Str::random(10));
            if (User::where('email', $request->email)->first()) {
                return redirect()->back()->with('error', 'Email này đã đăng ký');
            }
            if ($user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'token' => $token,
            ])) {
                Mail::send('admin.emails.active-account', compact('user'), function ($message) use ($user) {
                    $message->subject('Website Tìm Đồ Thất Lạc - Xác nhận tài khoản');
                    $message->to($user->email, $user->name);
                });
                return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công');
            }
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Đăng ký tài khoản không thành công');
        }
    }

    public function active(User $user, $token)
    {
        if ($user->token == $token) {
            $user->update(['status' => '1', 'token' => null]);
            return redirect()->route('login')->with('success', 'Kích hoạt tài khoản thành công!');
        } else {
            return redirect()->route('login')->with('error', 'Mã xác nhận không hợp lệ!');
        }
    }

    #Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);
        if (!User::where('email', $request->email)->first()) {
            return redirect()->back()->with('error', 'Email này chưa được đăng ký');
        }
        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
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
        //Đăng nhâp thất bại
        return redirect()->route('login')->with('error', 'Đăng nhập thất bại! Hãy kiểm tra lại mật khẩu của bạn!');
    }

    public function postForgetPass(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email hợp lệ',
            'email.exists' => 'Email này không tồn tại trong hệ thống'
        ]);
        try {
            $token = strtoupper(Str::random(10));
            $user = User::where('email', $request->email)->first();
            $user->update(['token' => $token]);

            Mail::send('admin.emails.forgot-password', compact('user'), function ($email) use ($user) {
                $email->subject('Website Tìm Đồ Thất Lạc - Xác nhận tài khoản');
                $email->to($user->email, $user->name);
            });
            return redirect()->back()->with('success', 'Vui lòng check mail để thực hiện thay đổi mật khẩu');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Gửi mail thất bại');
        }

    }

    public function getPass(User $user, $token){
        if($user->token == $token){
            return view('auth.passwords.reset', ['user' => $user]);
        }

        return abort(404);
    }

    public function postGetPass(User $user, $token,Request $request){
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ],[
            'password.required' => 'Mật khẩu không được để trống',
            'password_confirmation.required' => 'Mật khẩu xác nhận không được để trống',
            'password_confirmation.same' => 'Mật khẩu xác nhận không được để trống trùng khớp với mật khẩu vừa nhập',
        ]);

        $password_h = Hash::make($request->password);
        $user->update(['password' => $password_h, 'token' => null ]);

        return redirect()->route('login')->with('success', 'Thay đổi mật khẩu thành công bạn có thể đăng nhập');
    }
}
