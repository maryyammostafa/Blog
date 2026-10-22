<?php

use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\posts\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts', [PostsController::class, 'index'])->name('posts');

Route::prefix('/posts')->name('post.')->group(function () {
    Route::get('/add', [PostController::class, 'addView'])->name('addView');
    Route::post('/add', [PostController::class, 'addPost'])->name('add');

    Route::get('/edit/{id}', [PostController::class, 'editView'])->name('editView')->whereNumber('id');
    Route::post('/edit/{id}', [PostController::class, 'editPost'])->name('edit')->whereNumber('id');

    Route::get('/delete/{id}', [PostController::class, 'deletePost'])->name('delete')->whereNumber('id');

    Route::get('/restore/{id}', [PostController::class, 'restorePost'])->name('restore')->whereNumber('id');

    Route::get('/forceDelete/{id}', [PostController::class, 'forceDeletePost'])->name('forceDelete')->whereNumber('id');
});