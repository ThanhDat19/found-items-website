<?php

namespace App\Http\Services\Post;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostFollow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostService
{
    public function getCategory()
    {
        return Category::where('active', 1)->get();
    }

    public function get()
    {
        return Post::with('category')
            ->orderByDesc('id')->paginate(10);
    }

    public function insert($request)
    {
        try {
            $request->except('_token');
            Post::create([
                "name" => $request->input('name'),
                "category_id" => $request->input('category_id'),
                "description" => $request->input('description'),
                "content" => $request->input('content'),
                "image" => $request->input('image'),
                "slug" => Str::slug($request->input('name'), '-'),
                "author" => Auth::user()->id
            ]);
            Session::flash('success', 'Thêm bài đăng mới thành công');
        } catch (\Exception $err) {
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $post)
    {
        try {
            $post->fill([
                "name" => $request->input('name'),
                "category_id" => $request->input('category_id'),
                "description" => $request->input('description'),
                "content" => $request->input('content'),
                "image" => $request->input('image'),
                "slug" => Str::slug($request->input('name'), '-')
            ]);
            $post->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('success', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $post = Post::where('id', $request->input('id'))->first();

        if ($post) {
            $post->delete();
            return true;
        }
        return false;
    }

    public function deleteFollowPost($request)
    {
        $post = PostFollow::where('id', $request->input('id'))->first();

        if ($post) {
            $post->delete();
            return true;
        }
        return false;
    }
}
