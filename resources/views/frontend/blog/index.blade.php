@extends('layouts.frontend')

@section('title', 'Blog')

@section('content')
    <!-- Hero Section -->
    <div class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-3">Blog Megantronik</h1>
                    <p class="lead mb-4">Temukan artikel terbaru seputar teknologi, pulsa, data, dan tips menarik lainnya.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Posts Section -->
    @if($featured->count() > 0)
        <div class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Featured Posts</h2>
                <div class="row">
                    @foreach($featured as $post)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="position-relative">
                                    <img src="{{ $post->featured_image ?? 'https://placehold.co/800x400/0066cc/ffffff?text=Megantronik+Blog' }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 m-2 rounded-pill">
                                        Featured
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="badge bg-secondary">{{ $post->category->name }}</span>
                                        <small class="text-muted">{{ $post->published_at->format('d M Y') }}</small>
                                    </div>
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                                </div>
                                <div class="card-footer bg-white border-0">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <!-- Blog Posts -->
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h2>Artikel Terbaru</h2>
                        <hr>
                    </div>

                    @if($posts->count() > 0)
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <img src="{{ $post->featured_image ?? 'https://placehold.co/800x400/0066cc/ffffff?text=Megantronik+Blog' }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="badge bg-secondary">{{ $post->category->name }}</span>
                                                <small class="text-muted">{{ $post->published_at->format('d M Y') }}</small>
                                            </div>
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <p class="card-text text-muted">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada artikel yang tersedia.</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Categories -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Kategori</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($categories as $category)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{ route('blog.category', $category->slug) }}" class="text-decoration-none text-dark">
                                            {{ $category->name }}
                                        </a>
                                        <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Tag</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}" class="btn btn-sm btn-outline-secondary">
                                        {{ $tag->name }} ({{ $tag->posts_count }})
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
