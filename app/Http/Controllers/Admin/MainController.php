<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $posts = Post::count();
        $user = User::where('role', '0')->count();
        $admin = User::where('role', '1')->count();
        return view('admin.home', [
            'title' => 'Trang Quản Trị Admin',
            'categories' => $categories,
            'posts' => $posts,
            'user' => $user,
            'admin' => $admin
        ]);
    }
}
