<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/posts/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        #Admin
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Categories
        Route::prefix('categories')->group(function () {
            Route::get('list', [CategoryController::class, 'index']);
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('add', [CategoryController::class, 'store']);
            Route::get('edit/{category}', [CategoryController::class, 'show']);
            Route::post('edit/{category}', [CategoryController::class, 'update']);
            Route::delete('destroy', [CategoryController::class, 'destroy']);
        });

        #Posts
        Route::prefix('posts')->group(function () {
            Route::get('add', [PostController::class, 'create']);
            Route::post('add', [PostController::class, 'store']);
            Route::get('list', [PostController::class, 'index']);
            Route::get('edit/{post}', [PostController::class, 'show']);
            Route::post('edit/{post}', [PostController::class, 'update']);
            Route::delete('destroy', [PostController::class, 'destroy']);
        });

        #Users
        Route::prefix('users')->group(function () {
            Route::get('list', [UserController::class, 'index']);
            Route::get('edit/{user}', [UserController::class, 'show']);
            Route::put('edit/{id}', [UserController::class, 'update']);
        });
        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
});
