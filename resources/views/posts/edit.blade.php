@extends('layouts.app')

@section('navbar',true)

@section('main')

    <div class="edit my-5">
        <div class="container">
            <h2 class="fs-1 fw-bold mb-4 text-center">Edit Post</h2>
            @session('success')
                <p class='alert text-success text-center fs-4 w-100'>{{ $value }}</p>
            @endsession
            <form class="m-auto" action="{{ route('post.edit', ['id' => $post->id]) }}" method="POST">
                @CSRF
                <div class="box mb-2">
                    <label for="AuthorName" class="w-100 mb-1">Author Name :</label>
                    <input type="text" class="w-100 form-control" name="authorName" id="AuthorName" value="{{ $post->author_name }}">
                    @error('authorName')
                        <p class='alert text-danger w-100 m-0 ms-1 mt-1 p-0'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="box mb-2">
                    <label for="Title" class="w-100 mb-1">Title :</label>
                    <input type="text" class="w-100 form-control" name="title" id="Title" value="{{ $post->title }}">
                    @error('title')
                        <p class='alert text-danger w-100 m-0 ms-1 mt-1 p-0'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="box mb-2">
                    <label for="Body" class="w-100 mb-1">Body :</label>
                    <textarea class="w-100 form-control" name="body" id="Body" rows="5" style="resize: none;">{{ $post->body }}</textarea>
                    @error('body')
                        <p class='alert text-danger w-100 m-0 ms-1 mt-1 p-0'>{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn w-100 py-2 mt-3" style="background: #1e293b; color: #fff;">Edit</button>
            </form>
        </div>
    </div>

@endsection