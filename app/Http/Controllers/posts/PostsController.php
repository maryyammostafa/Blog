<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller{
    public function index(){
        $posts = Post::withTrashed()->latest()->paginate(5);
        return view('posts.posts', compact('posts'));
    }
}
