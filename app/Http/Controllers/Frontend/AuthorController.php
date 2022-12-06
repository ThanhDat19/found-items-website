<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index( $id )
    {
        $user = User::find($id);
        return view('frontend.author.index', ['user' => $user, 'posts' =>$user->posts]);
    }
}
