<nav class="navbar navbar-expand-lg bg-light" style="border-bottom: 1px solid #e5e7eb;">
    <div class="container py-1">
        <a class="navbar-brand fs-5 fw-bold" href="{{ route('home') }}" style="color: #1e293b;">BLOG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIS('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIS('posts') ? 'active' : '' }}" href="{{ route('posts') }}">Posts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>