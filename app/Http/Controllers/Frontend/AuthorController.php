<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $posts = $user->posts->where('active', 1);
        return view('frontend.author.index', ['user' => $user, 'posts' => $posts]);
    }
}
