<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller{
    public function index(){
        $posts = Post::latest()->take(3)->get();
        return view('home.home', compact('posts'));
    }
}
