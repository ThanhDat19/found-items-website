<?php

namespace App\Http\Services\Category;

use Illuminate\Support\Str;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function create(Request $request)
    {
        try {
            Category::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'title' => (string) $request->input('title'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Tạo Loại Bài Đăng Thành Công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getAll()
    {
        return Category::orderbyDesc('id')->paginate(10);
    }

    public function update($request, $category): bool
    {
        try {
            $category->fill($request->input());
            $category->save();

            Session::flash('success', 'Cập nhật loại bài đăng thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', 'Loại bài đăng cha không được chọn chính nó!');
        }
        return false;
    }


    public function destroy($request)
    {
        $id = $request->id;
        $category = Category::where('id', $id)->first();

        if ($category) {
            return Category::where('id', $id)->delete();
        }
        return false;
    }
}
