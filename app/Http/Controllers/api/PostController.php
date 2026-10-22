<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function getAll() {
        $posts = Post::latest()->withTrashed()->paginate(5);
        return response()->json($posts);
    }
    public function show(string $id){
        return Post::findOrFail($id);
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

        return response()->json(['message' => 'Post has been added successfully', 'data' => $post]);
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

        return response()->json(['message' => 'Post has been edited successfully', 'data' => $post]);
    }
    public function deletePost(string $id){
        $post = $this->getPost($id);
        $post->delete();
        return response()->json(['message' => 'Post has been deleted successfully']);
    }
    public function restorePost(string $id){
        $post = $this->getPost($id,true);
        $post->restore();
        return response()->json(['message' => 'Post has been restored successfully']);
    }
    public function forceDeletePost(string $id){
        $post = $this->getPost($id,true);
        $post->forceDelete();
        return response()->json(['message' => 'Post has been permanently deleted']);
    }
    private function getPost(string $id, bool $isTrashed = false){
        $post = $isTrashed ? Post::withTrashed()->find($id) : Post::find($id);
        if ($post == null)
            abort(404, 'Post not found');
        return $post;
    }
}
