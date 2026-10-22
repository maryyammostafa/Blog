<?php

use App\Http\Controllers\api\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'getAll']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::prefix('/posts')->group(function () {
    Route::post('/add', [PostController::class, 'addPost']);

    Route::post('/edit/{id}', [PostController::class, 'editPost'])->whereNumber('id');

    Route::delete('/delete/{id}', [PostController::class, 'deletePost'])->whereNumber('id');

    Route::post('/restore/{id}', [PostController::class, 'restorePost'])->whereNumber('id');

    Route::delete('/forceDelete/{id}', [PostController::class, 'forceDeletePost'])->whereNumber('id');
});