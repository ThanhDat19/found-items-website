<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh Sách Bài Đăng',
            'posts' => $this->postService->get()
        ]);
    }


    public function create()
    {
        return view('admin.posts.add', [
            'title' => 'Thêm Bài Đăng',
            'categories' => $this->postService->getCategory()
        ]);
    }


    public function store(PostRequest $request)
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

    public function update(Request $request, Post $post)
    {
        $result = $this->postService->update($request, $post);

        if($result)
        {
            return redirect('admin/posts/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->postService->delete($request);
        if($result)
        {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài đăng thành công'
            ]);
        }
        return response()->json(['error' => true]);
    }
}
