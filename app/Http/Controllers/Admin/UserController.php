<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(10);
        return view('admin.users.list', [
            'title' => 'Danh Sách Thành Viên',
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.edit', [
            'title' => 'Chỉnh Sửa Quyền Thành Viên',
            'user' => $user,
        ]);
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        try {
            $user->role = $request->role;
            $user->update();
            Session::flash('success', 'Cập nhật thành công quyền tài khoản');
            return redirect('admin/users/list');
        } catch (\Exception $err) {
            Session::flash('success', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return redirect()->back();
        }
    }
}
