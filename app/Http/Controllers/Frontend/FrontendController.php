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
        return view('frontend.index');
    }

    public function viewCategoryPost($category_slug)
    {
        $category = Category::where([
            'slug' => $category_slug,
            'active' => '1'
        ])->first();

        if ($category) {
            $posts = Post::where([
                'category_id' => $category->id,
                'active' => '1'
            ])->paginate(1);

            return view('frontend.post.index', [
                'category' => $category,
                'posts' => $posts
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
                'post' => $post
            ]);
        } else {
            return redirect('/');
        }
    }
}
