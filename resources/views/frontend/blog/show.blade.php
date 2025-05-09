@extends('layouts.frontend')

@section('title', $post->title)

@section('meta')
    <meta name="description" content="{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 160) }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 160) }}">
    @if($post->featured_image)
        <meta property="og:image" content="{{ asset($post->featured_image) }}">
    @endif
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    <meta property="og:type" content="article">
@endsection

@section('styles')
    <style>
        .blog-content img {
            max-width: 100%;
            height: auto;
        }
        .blog-content h2, .blog-content h3, .blog-content h4 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        .blog-content p {
            margin-bottom: 1rem;
            line-height: 1.7;
        }
        .blog-content ul, .blog-content ol {
            margin-bottom: 1rem;
            padding-left: 2rem;
        }
        .blog-content blockquote {
            border-left: 4px solid #0d6efd;
            padding-left: 1rem;
            font-style: italic;
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 1rem;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-5 fw-bold mb-3">{{ $post->title }}</h1>
                    <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
                        <span><i class="fas fa-user me-1"></i> {{ $post->user->name }}</span>
                        <span><i class="fas fa-calendar me-1"></i> {{ $post->published_at->format('d M Y') }}</span>
                        <span><i class="fas fa-folder me-1"></i> {{ $post->category->name }}</span>
                    </div>
                    @if($post->tags->count() > 0)
                        <div class="d-flex justify-content-center flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-secondary text-decoration-none">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <!-- Blog Post Content -->
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 mb-4">
                        @if($post->featured_image)
                            <img src="{{ asset($post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 400px; object-fit: cover;">
                        @endif
                        <div class="card-body p-4">
                            @if($post->excerpt)
                                <div class="lead mb-4 fst-italic">
                                    {{ $post->excerpt }}
                                </div>
                                <hr>
                            @endif
                            <div class="blog-content">
                                {!! $post->content !!}
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
                                <div>
                                    <span class="text-muted"><i class="fas fa-eye me-1"></i> {{ $post->view_count }} kali dilihat</span>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}" class="btn btn-sm btn-outline-info" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}" class="btn btn-sm btn-outline-success" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    @if($related->count() > 0)
                        <div class="mb-4">
                            <h3>Artikel Terkait</h3>
                            <hr>
                        </div>
                        <div class="row">
                            @foreach($related as $relatedPost)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <img src="{{ $relatedPost->featured_image ?? 'https://placehold.co/800x400/0066cc/ffffff?text=Megantronik+Blog' }}" class="card-img-top" alt="{{ $relatedPost->title }}" style="height: 150px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $relatedPost->title }}</h6>
                                            <p class="card-text small text-muted">{{ Str::limit($relatedPost->excerpt ?? strip_tags($relatedPost->content), 60) }}</p>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <a href="{{ route('blog.show', $relatedPost->slug) }}" class="btn btn-outline-primary btn-sm">Baca</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
