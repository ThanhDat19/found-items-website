<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $latest_posts=Post::where([
            'active' => '1',
        ])->orderByDesc('created_at')->take(3)->get();
        return view('frontend.index', ['latest_posts' => $latest_posts]);
    }

    public function viewCategoryPost($category_slug)
    {
        $category = Category::where([
            'slug' => $category_slug,
            'active' => '1'
        ])->first();

        $latest_posts=Post::where([
            'category_id' => $category->id,
            'active' => '1',
        ])->orderByDesc('created_at')->take(3)->get();
        if ($category) {
            $posts = Post::where([
                'category_id' => $category->id,
                'active' => '1'
            ])->paginate(3);

            return view('frontend.post.index', [
                'category' => $category,
                'posts' => $posts,
                'latest_posts' => $latest_posts
            ]);
        } else {
            return redirect('/');
        }
    }

    public function viewPost($category_slug, $post_slug){
        $category = Category::where([
            'slug' => $category_slug,
            'active' => '1'
        ])->first();

        if ($category) {
            $post = Post::where([
                'category_id' => $category->id,
                'slug' => $post_slug,
                'active' => '1'
            ])->first();

            return view('frontend.post.view', [
                'post' => $post,
                'category'=> $category
            ]);
        } else {
            return redirect('/');
        }
    }
}
