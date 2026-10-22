@extends('layouts.app')

@section('navbar',true)

@section('main')

    <div class="posts my-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="fw-bold">Manage Posts</h2>
                    <p>Create, edit and manage your posts.</p>
                </div>
                <a href="{{ route('post.addView') }}" class="btn px-sm-4 py-sm-2" style="background: #1e293b; color: #fff;">Add Post</a>
            </div>
            @forelse($posts as $post)
                <x-post :post="$post" :operations="true" />
            @empty
                <p class='alert text-danger w-100 text-center fs-2 mt-5'>No posts available yet.</p>
            @endforelse

            <div class="mt-4">{{ $posts->links() }}</div>
        </div>
    </div>

@endsection