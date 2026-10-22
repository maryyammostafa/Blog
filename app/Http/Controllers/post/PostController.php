<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function addView() {
        return view('posts.add');
    }
    public function addPost(Request $request) {
        $request->validate([
            'authorName' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->author_name = $request->authorName;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('success', 'Post has been added successfully');
    }
    public function editView(string $id) {
        $post = $this->getPost($id);
        return view('posts.edit',compact('post'));
    }
    public function editPost(Request $request, string $id) {
        $request->validate([
            'authorName' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = $this->getPost($id);
        $post->author_name = $request->authorName;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts');
    }
    public function deletePost(string $id){
        $post = $this->getPost($id);
        $post->delete();
        return redirect()->back();
    }
    public function restorePost(string $id){
        $post = $this->getPost($id,true);
        $post->restore();
        return redirect()->back();
    }
    public function forceDeletePost(string $id){
        $post = $this->getPost($id,true);
        $post->forceDelete();
        return redirect()->back();
    }
    private function getPost(string $id, bool $isTrashed = false){
        $post = $isTrashed ? Post::withTrashed()->find($id) : Post::find($id);
        if ($post == null)
            abort(404);
        return $post;
    }
}
