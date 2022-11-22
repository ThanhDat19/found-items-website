<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_posts=Post::where([
            'active' => '1',
        ])->orderByDesc('created_at')->take(3)->get();
        return view('frontend.home', ['latest_posts' => $latest_posts]);
    }
}
