<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use App\Models\PostFollow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;

    public function __construct(PostService $postService, CategoryService $categoryService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh Sách Bài Đăng',
            'posts' => $this->postService->get(),
            'categories' => $this->postService->getCategory()
        ]);
    }


    public function create()
    {
        return view('admin.posts.add', [
            'title' => 'Thêm Bài Đăng',
            'categories' => $this->postService->getCategory()
        ]);
    }
    public function createPost()
    {
        return view('frontend.post.add', [
            'title' => 'Thêm Bài Đăng',
            'categories' => $this->postService->getCategory(),
        ]);
    }


    public function store(PostRequest $request)
    {
        $this->postService->insert($request);
        return redirect()->back();
    }
    public function storePost(PostRequest $request)
    {
        $this->postService->insert($request);
        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('admin.posts.edit', [
            'title' => 'Chỉnh Sửa Bài Đăng',
            'post' => $post,
            'categories' => $this->postService->getCategory()
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $result = $this->postService->update($request, $post);

        if ($result) {
            return redirect('admin/posts/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->postService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài đăng thành công'
            ]);
        }
        return response()->json(['error' => true]);
    }

    public function filter(Request $request)
    {
        $posts = Post::where('category_id', $request->category)
            ->with('category')
            ->orderByDesc('id')->paginate(10);
        return view('admin.posts.list', [
            'title' => 'Danh Sách Bài Đăng',
            'posts' => $posts,
            'categories' => $this->postService->getCategory()
        ]);
    }

    public function follow(Request $request)
    {
        try {
            PostFollow::create([
                'user_id' => $request->user,
                'post_id' => $request->post,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'error' => true,
                'message' => 'Theo dõi bài đăng thất bại'
            ]);
        }
        return response()->json([
            'error' => false,
            'message' => 'Theo dõi bài đăng thành công'
        ]);
    }

    public function viewFollowPost($id)
    {
        $followPosts = PostFollow::where('user_id', $id)->get();
        return view('frontend.post.follow.list', ['followPosts' => $followPosts]);
    }

    public function deleteFollowPost(Request $request)
    {
        try {
            $result = $this->postService->deleteFollowPost($request);
            if ($result) {
                return response()->json([
                    'error' => false,
                    'message' => 'Xóa bài theo dõi thành công'
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'error' => true,
                'message' => 'Đã có lỗi xảy ra'
            ]);
        }
    }
}
