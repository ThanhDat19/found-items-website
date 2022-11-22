<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\ImageRequest;
use App\Http\Requests\User\ProfileRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function indexUser()
    {
        $users = User::where('role', '0')->orderBy('id')->paginate(10);
        return view('admin.accounts.users.list', [
            'title' => 'Danh Sách Thành Viên',
            'users' => $users
        ]);
    }
    public function indexAdmins()
    {
        $users = User::where('role', '1')
            ->orWhere('role', '2')
            ->orderBy('id')
            ->paginate(10);
        return view('admin.accounts.admins.list', [
            'title' => 'Danh Sách Thành Viên Quản Lý',
            'users' => $users
        ]);
    }
    public function showAdmins(User $user)
    {
        return view('admin.accounts.admins.edit', [
            'title' => 'Chỉnh Sửa Admin',
            'user' => $user,
        ]);
    }
    public function showUser(User $user)
    {
        return view('admin.accounts.users.edit', [
            'title' => 'Chỉnh Sửa Thành Viên',
            'user' => $user,
        ]);
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        try {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->update();
            Session::flash('success', 'Cập nhật thành công tài khoản');
            return redirect('admin/accounts/users/list');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return redirect()->back();
        }
    }
    public function updateAdmins(Request $request, $id)
    {
        $user = User::find($id);
        try {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->update();
            Session::flash('success', 'Cập nhật thành công Admin');
            return redirect('admin/accounts/admins/list');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        if ($user->role == 1 || $user->role == 2)
            return view('admin.profile.edit', ['title' => 'Chỉnh sửa thông tin cá nhân']);
        return view('frontend.profile.edit');
    }

    public function updateProfile(ProfileRequest $request, $id)
    {
        $user = User::find($id);
        try {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->update();
            Session::flash('success', 'Cập nhật thành công thông tin tài khoản');
            return redirect('/profile/edit/' . $user->id);
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function updateAvatarProfile(ImageRequest $request, $id)
    {
        $user = User::find($id);
        try {
            $user->avatar = $request->avatar;
            $user->update();
            Session::flash('success', 'Cập nhật thành công avatar');
            return redirect('/profile/edit/' . $user->id);
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return redirect()->back();
        }
    }
}
