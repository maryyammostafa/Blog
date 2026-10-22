@extends('layouts.app')

@section('navbar',true)

@section('main')

    <div class="posts my-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="fw-bold" style="color: #c59d5f; font-size: 14px; letter-spacing: 2px;">WELCOME</span>
                <h1 class="fw-bold">Latest Posts</h1>
            </div>
            @forelse($posts as $post)
                <x-post :post="$post" :operations="false" />
            @empty
                <p class='alert text-danger w-100 text-center fs-2 mt-5'>No posts available yet.</p>
            @endforelse
        </div>
    </div>

@endsection