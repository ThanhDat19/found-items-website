<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthConTroller;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();
#Authentication
Route::prefix('auth')->group(function (){
    Route::post('register', [AuthConTroller::class, 'register']);
    Route::get('active-account/{user}/{token}',[AuthConTroller::class, 'active']);
    Route::post('login', [AuthConTroller::class, 'login']);
    // Route::get('forgot-password', [AuthConTroller::class, 'forgotPassword']);
});

Route::get('/', [FrontendController::class, 'index']);
Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::get('/posts/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/posts/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

#Comment System
Route::post('comments', [CommentController::class, 'store']);
Route::delete('/posts/{category_slug}/{post_slug}/comments/destroy', [CommentController::class, 'destroy']);
Route::post('/posts/follow', [PostController::class, 'follow']);

#Profile
Route::prefix('profile')->group(function () {
    Route::get('edit/{id}', [UserController::class, 'editProfile']);
    Route::post('edit/{id}', [UserController::class, 'updateProfile']);
    Route::post('edit/avatar/{id}', [UserController::class, 'updateAvatarProfile']);
    #Post
    Route::prefix('posts')->group(function () {
        Route::get('add', [PostController::class, 'createPost']);
        Route::post('add', [PostController::class, 'storePost']);
        Route::get('follow/{id}', [PostController::class, 'viewFollowPost']);
        Route::delete('/follow/destroy', [PostController::class, 'deleteFollowPost']);
    });
});
#Upload
Route::post('upload/services', [UploadController::class, 'store']);

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
            Route::post('list', [PostController::class, 'filter']);
            Route::get('edit/{post}', [PostController::class, 'show']);
            Route::post('edit/{post}', [PostController::class, 'update']);
            Route::delete('destroy', [PostController::class, 'destroy']);
        });

        #Accounts
        Route::prefix('accounts')->group(function (){
            #Users
            Route::prefix('users')->group(function () {
                Route::get('list', [UserController::class, 'indexUser']);
                Route::get('edit/{user}', [UserController::class, 'showUser']);
                Route::post('edit/{id}', [UserController::class, 'updateUser']);
                Route::delete('delete', [UserController::class, 'deleteUser']);
            });

            #Admins
            Route::prefix('admins')->group(function () {
                Route::get('list', [UserController::class, 'indexAdmins']);
                Route::get('add', [UserController::class, 'createAdmins']);
                Route::post('add', [UserController::class, 'storeAdmins']);
                Route::get('edit/{user}', [UserController::class, 'showAdmins']);
                Route::post('edit/{id}', [UserController::class, 'updateAdmins']);
                Route::delete('delete', [UserController::class, 'deleteAdmins']);
            });
        });
    });
});
