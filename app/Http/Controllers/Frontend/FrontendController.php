<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Post\PostService;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostFollow;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        $users = User::where('role', '0')->get();
        $max = 0;
        $findUser = null;
        foreach ($users as $key => $user) {
            $count = Post::where('author', $user->id)->count();
            if ($max < $count) {
                $max = $count;
                $findUser =  User::find($user->id);
            }
        }
        $latest_posts = Post::where([
            'active' => '1',
        ])->orderByDesc('created_at')->paginate(4);
        if ($findUser != null) {
            $posts = Post::where('author', $findUser->id)->get(); // các bài đã đăng
            $sum = 0;
            foreach ($posts as $post) {
                $sum += $post->sumFollowPostByPost($post->id);
            }
            return view('frontend.home', [
                'latest_posts' => $latest_posts,
                'findUser' => $findUser,
                'maxPost' => $max,
                'sumFollowPost' => $sum,
                'postsHot' => $posts->take(3)
            ]);
        }
        return view('frontend.home', [
            'latest_posts' => $latest_posts,
        ]);
    }
    public function viewCategoryPost($category_slug)
    {
        $category = Category::where([
            'slug' => $category_slug,
            'active' => '1',
        ])->first();

        $latest_posts = Post::where([
            'category_id' => $category->id,
            'active' => '1',
        ])->orderByDesc('created_at')->take(3)->get();
        if ($category) {
            $posts = Post::where([
                'category_id' => $category->id,
                'active' => '1',

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

    public function viewPost($category_slug, $post_slug)
    {
        $category = Category::where([
            'slug' => $category_slug,
            'active' => '1',
        ])->first();

        if ($category) {
            $post = Post::where([
                'category_id' => $category->id,
                'slug' => $post_slug,
                'active' => '1',

            ])->first();
            $followPost = PostFollow::where('post_id', $post->id)->get();
            return view('frontend.post.view', [
                'follow' => $followPost,
                'post' => $post,
                'category' => $category
            ]);
        } else {
            return redirect('/');
        }
    }

    public function report($category_slug, $post_slug, $post_id){
        $post = Post::find($post_id);
        return view('frontend.post.report.index', ['post' => $post]);
    }

    public function reportPost($category_slug, $post_slug, $post_id, Request $request){
        $request->validate([
            'description' => 'required'
        ],[
            'description.required' => 'Nội dung không được để trống'
        ]);
        $post = Post::find($post_id);
        Report::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'description' => $request->description
        ]);

        return $this->viewPost($category_slug, $post_slug);
    }

    public function postList($id){
        $user = User::find($id);
        return view('frontend.post.list', ['posts' =>$user->posts]);
    }

    public function postDestroy(Request $request){
        $id = $request->id;
        $post = Post::find($id);
        $result = true;
        if ($post) {
            $post->delete();
        }
        else{
            $result = false;
        }
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài viết thành công'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }

    public function postEdit($id){
        $post = Post::find($id);
        return view('frontend.post.edit', ['post' => $post, 'categories' => $this->postService->getCategory()]);
    }

    public function postUpdate(Request $request, $id){
        // dd($request->input());
        $post = Post::find($id);
        try {
            $post->fill([
                "name" => $request->input('name'),
                "category_id" => $request->input('category_id'),
                "description" => $request->input('description'),
                "content" => $request->input('content'),
                "image" => $request->input('image'),
                "slug" => Str::slug($request->input('name'), '-')
            ]);

            if(!empty($request->active)){
                $post->active = $request->active;
            }
            $post->save();
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route('posts-list', ['id' => Auth::user()->id]);
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return redirect()->back();
        }
    }
}
