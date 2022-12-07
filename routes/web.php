<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthConTroller;
use App\Http\Controllers\Frontend\AuthorController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Auth::routes();
#Authentication
Route::prefix('auth')->group(function (){
    Route::post('register', [AuthConTroller::class, 'register']);
    Route::get('active-account/{user}/{token}',[AuthConTroller::class, 'active'])->name('active-account');
    Route::post('login', [AuthConTroller::class, 'login']);
    Route::post('forgot-password', [AuthConTroller::class, 'postForgetPass']);
    Route::get('forgot-password/{user}/{token}', [AuthConTroller::class, 'getPass'])->name('forgot-pass');
    Route::post('reset-password/{user}/{token}', [AuthConTroller::class, 'postGetPass'])->name('reset-password');
});

#Front End
Route::get('/', [FrontendController::class, 'index']);
Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::get('/posts/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/posts/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);
Route::get('/posts/report/{category_slug}/{post_slug}/{post}', [FrontendController::class, 'report'])->name('report');
Route::post('/posts/report/{category_slug}/{post_slug}/{post}', [FrontendController::class, 'reportPost'])->name('reportPost');

#Author
Route::prefix('author')->group(function() {
    Route::get('/{id}', [AuthorController::class, 'index']);
});

#Comment System
Route::post('comments', [CommentController::class, 'store']);
Route::delete('/posts/{category_slug}/{post_slug}/comments/destroy', [CommentController::class, 'destroy']);
Route::post('/posts/follow', [PostController::class, 'follow']);

#Search
Route::get('post-list', [SearchController::class, 'postListAjax']);
Route::get('/search-post', [SearchController::class, 'search'])->name('search');
Route::get('/search-post/filter', [SearchController::class, 'filter'])->name('filter');
Route::get('/search-post/news', [SearchController::class, 'news']);


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
            Route::post('allow', [PostController::class, 'allow']);
            Route::delete('destroy', [PostController::class, 'destroy']);
            Route::delete('/report/destroy', [PostController::class, 'destroyReport']);
            Route::get('view/{post}', [PostController::class, 'viewPost']);
            Route::get('view/list-report/{post}', [PostController::class, 'reportList'])->name('report-list');
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
                // Route::post('edit/{id}', [UserController::class, 'updateAdmins']);
                Route::delete('delete', [UserController::class, 'deleteAdmins']);
            });
        });
    });
});
