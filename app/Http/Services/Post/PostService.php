<?php

namespace App\Http\Services\Post;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostFollow;
use App\Models\Report;
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
            if(Auth::user()->role == 2 || Auth::user()->role == 1){
                $post = Post::create([
                    "name" => $request->input('name'),
                    "category_id" => $request->input('category_id'),
                    "description" => $request->input('description'),
                    "content" => $request->input('content'),
                    "image" => $request->input('image'),
                    "slug" => Str::slug($request->input('name'), '-'),
                    "author" => Auth::user()->id,
                ]);
                $post->active = 1;
                $post->save();
            }else {
                Post::create([
                    "name" => $request->input('name'),
                    "category_id" => $request->input('category_id'),
                    "description" => $request->input('description'),
                    "content" => $request->input('content'),
                    "image" => $request->input('image'),
                    "slug" => Str::slug($request->input('name'), '-'),
                    "author" => Auth::user()->id,
                ]);
            }
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
            $post->follow()->delete();
            $post->report()->delete();
            PostFollow::where('post_id', $post->id)->delete();
            Report::where('post_id', $post->id)->delete();
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

    public function destroyReport($request){
        $report = Report::where('id', $request->input('id'))->first();

        if ($report) {
            $report->delete();
            return true;
        }
        return false;
    }
}
