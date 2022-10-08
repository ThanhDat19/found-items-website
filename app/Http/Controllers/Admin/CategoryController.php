<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return view('admin.categories.list', [
            'title' => 'Danh Sách Loại Bài Đăng',
            'categories' => $this->categoryService->getAll()
        ]);
    }
    public function create()
    {
        return view('admin.categories.add', [
            'title' => 'Thêm Loại Bài Đăng',
        ]);
    }

    public function store(CreateFormRequest $request)
    {

        $this->categoryService->create($request);
        return redirect()->back();
    }

    public function show(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Chỉnh Sửa Loại Bài Đăng' . $category->name,
            'category' => $category,
        ]);
    }

    public function update(Category $category, CreateFormRequest $request)
    {
        $this->categoryService->update($request, $category);
        return redirect('/admin/categories/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->categoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công loại bài đăng'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
