<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('message', 'Dữ liệu không hợp lệ');
            }
            $post = Post::where([
                'slug' => $request->post_slug,
                'active' => '1'
            ])->first();

            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Bình luận thành công');
            } else {
                return redirect()->back()->with('message', 'Không tìm thấy bài đăng');
            }
        } else {
            return redirect()->back()->with('message', 'Đăng nhập để bình luận');
        }
    }


    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $commet = Comment::where('id', $request->input('id'))->first();
            $result = false;
            if ($commet) {
                $commet->delete();
                $result = true;
            }

            if ($result) {
                return response()->json([
                    'error' => false,
                    'message' => 'Xóa bình luận thành công'
                ]);
            }
            return response()->json(['error' => true]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Đăng nhập để xóa'
            ]);
        }
    }
}
