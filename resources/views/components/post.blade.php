<div class="post p-4 mt-1" style="border-bottom: 1px solid #e5e7eb; ">
    <div class="row">
        <div class="col-md-5 col-lg-4 col-xl-3">
            <div class="item">
                <img src="{{ Vite::asset('resources/images/blog.webp') }}" class="w-100 rounded" alt="">
                <p class="text-center mb-0 mt-2">{{ $post->author_name }}</p>
            </div>
        </div>
        <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="item mt-3 mt-md-0 ms-md-5 ps-lg-4 position-relative">
                @if ($post->deleted_at !== null)
                    <span class="badge text-bg-danger position-absolute" style="top: 5px; right: 0;">Deleted</span>
                @endif
                <h3>{{ $post->title }}</h3>
                <h6 style="color: #c59d5f;">{{ $post->created_at->format('M d, Y, g:i a') }}</h6>
                <p class="w-75">{{ $post->body }}</p>
                @if ($operations)
                    <div class="buttons mt-4">
                        @if ($post->deleted_at !== null)
                            <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-primary">Restore</a>
                        @else
                            <a href="{{ route('post.editView', ['id' => $post->id]) }}" class="btn btn-info text-light">Edit</a>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-warning text-light">Delete</a>
                        @endif
                        <a href="{{ route('post.forceDelete', ['id' => $post->id]) }}" class="btn btn-danger">Force Delete</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>