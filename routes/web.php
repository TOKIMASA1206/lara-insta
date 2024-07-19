<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


Auth::routes();


Route::group(["middleware" => "auth"], function(){

    // Home
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::resource('/posts', PostController::class)->except('index');
    Route::get('/search', [HomeController::class, 'search'])->name('search.result');
    Route::get('/suggest', [HomeController::class, 'suggest'])->name('suggest.show');

    // Comment
    Route::post('/posts/{post}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::resource('/comments', CommentController::class)->except('store');

    // Profile
    Route::resource('profile', App\Http\Controllers\ProfileController::class)->parameters([
        'profile' => 'user'
    ])->only(['edit', 'update', 'show']);
    

    // Like
    Route::get('/likes', [LikeController::class, 'show'])->name('likes.show');
    Route::post('/likes/{post}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes/{post}', [LikeController::class, 'destroy'])->name('likes.destroy');
    

    // Follow
    Route::post('/follow/{user}', [FollowController::class, 'store'])->name('follow.store');
    Route::delete('/follow/{user}', [FollowController::class, 'destroy'])->name('follow.destroy');
    Route::get('/profile/follower/{user}', [App\Http\Controllers\FollowController::class, 'follower'])->name('profile.follower');
    Route::get('/profile/following/{user}', [App\Http\Controllers\FollowController::class, 'following'])->name('profile.following');


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        // Users routes
        Route::get('users', [UsersController::class, 'index'])->name('users');
        Route::delete('users/delete/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::post('users/restore/{id}', [UsersController::class, 'restore'])->name('users.restore');
    
        // Posts routes
        Route::get('posts', [PostsController::class, 'index'])->name('posts');
        Route::delete('posts/delete/{post}', [PostsController::class, 'destroy'])->name('posts.hide');
        Route::post('posts/restore/{id}', [PostsController::class, 'restore'])->name('posts.unhide');
    
        // Categories routes
        Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
        Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
        Route::delete('categories/delete/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
        Route::patch('categories/update/{category}', [CategoriesController::class, 'update'])->name('categories.update');
    });
    

});

// Route::group(['middleware' => ['auth', AdminMiddleware::class]], function () {
//     // ここにadminページのルートを定義する
//     // Admin
//     Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
//     Route::delete('/admin/users/delete/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
//     Route::post('/admin/users/restore/{id}', [UsersController::class, 'restore'])->name('admin.users.restore');



//     Route::get('/admin/posts', [PostsController::class, 'index'])->name('admin.posts');
//     Route::delete('/admin/posts/delete/{post}', [PostsController::class, 'destroy'])->name('admin.posts.hide');
//     Route::post('/admin/posts/restore/{id}', [PostsController::class, 'restore'])->name('admin.posts.unhide');


//     Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
//     Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
//     Route::delete('/admin/categories/delete/{category}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
//     Route::patch('/admin/categories/update/{category}', [CategoriesController::class, 'update'])->name('admin.categories.update');

// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


