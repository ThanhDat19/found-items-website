<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class SearchController extends Controller
{
    public function postListAjax(){
        $posts = Post::select('name')->where('active', '1')->get();
        $data = [];

        foreach($posts as $post){
            $data[] = $post['name'];
        }
        return $data;
    }
    public function search(Request $request){
        $postName = $request->search;
        if($postName != ""){
            $posts = Post::where('name', 'like', '%'.$postName .'%')->get();
            if($posts){
                return view('frontend.post.search.index', ['posts' => $posts, 'categories'=> Category::all()]);
            }
            else{
                return redirect()->back()->with('error', 'Không tìm thấy bài đăng');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function filter(Request $request){
        $checked = $_GET['category'];
        $posts = Post::whereIn('category_id', $checked)->get();
        if($posts){
            return view('frontend.post.search.index', ['posts' => $posts, 'categories'=> Category::all()]);
        }
        else{
            return redirect()->back()->with('error', 'Không tìm thấy bài đăng');
        }
    }

    public function news(){
        $posts = Post::orderByDesc('created_at')->get();
        if($posts){
            return view('frontend.post.search.index', ['posts' => $posts, 'categories'=> Category::all()]);
        }
        else{
            return redirect()->back()->with('error', 'Không tìm thấy bài đăng');
        }
    }
}
