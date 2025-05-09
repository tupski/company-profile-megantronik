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

                    <!-- Comments Section -->
                    @if(\App\Models\Setting::getValue('blog_comments_enabled', 1))
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h3 class="mb-4">Komentar ({{ $post->approvedComments()->count() }})</h3>

                            @if($post->approvedComments()->parentOnly()->count() > 0)
                                <div class="comments-list mb-5">
                                    @foreach($post->approvedComments()->parentOnly()->latest()->get() as $comment)
                                        <div class="comment mb-4" id="comment-{{ $comment->id }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                        <i class="fas fa-user text-secondary"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <h6 class="mb-0 fw-bold">{{ $comment->name }}</h6>
                                                        <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    <div class="mb-2">
                                                        {{ $comment->content }}
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-primary reply-btn" data-comment-id="{{ $comment->id }}">
                                                        <i class="fas fa-reply me-1"></i> Balas
                                                    </button>

                                                    <!-- Reply Form (Hidden by default) -->
                                                    <div class="reply-form mt-3 d-none" id="reply-form-{{ $comment->id }}">
                                                        <form action="{{ route('blog.comment.store', $post) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" name="name" placeholder="Nama Anda" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="email" class="form-control" name="email" placeholder="Email Anda" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" name="content" rows="3" placeholder="Tulis balasan Anda di sini..." required></textarea>
                                                            </div>

                                                            @if(\App\Models\Setting::getValue('captcha_enabled', 0) && \App\Models\Setting::getValue('captcha_site_key'))
                                                                <div class="mb-3">
                                                                    @php
                                                                        $captchaType = \App\Models\Setting::getValue('captcha_type');
                                                                        $captchaSiteKey = \App\Models\Setting::getValue('captcha_site_key');
                                                                    @endphp

                                                                    @if($captchaType == 'recaptcha')
                                                                        <div class="g-recaptcha" data-sitekey="{{ $captchaSiteKey }}"></div>
                                                                    @elseif($captchaType == 'hcaptcha')
                                                                        <div class="h-captcha" data-sitekey="{{ $captchaSiteKey }}"></div>
                                                                    @elseif($captchaType == 'turnstile')
                                                                        <div class="cf-turnstile" data-sitekey="{{ $captchaSiteKey }}"></div>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                            <div class="d-flex justify-content-end">
                                                                <button type="button" class="btn btn-outline-secondary me-2 cancel-reply" data-comment-id="{{ $comment->id }}">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- Replies -->
                                                    @if($comment->replies()->approved()->count() > 0)
                                                        <div class="replies mt-3">
                                                            @foreach($comment->replies()->approved()->latest()->get() as $reply)
                                                                <div class="reply mt-3 border-start border-3 ps-3">
                                                                    <div class="d-flex align-items-center mb-1">
                                                                        <h6 class="mb-0 fw-bold">{{ $reply->name }}</h6>
                                                                        <small class="text-muted ms-2">{{ $reply->created_at->diffForHumans() }}</small>
                                                                    </div>
                                                                    <div>
                                                                        {{ $reply->content }}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4 text-muted">
                                    <i class="fas fa-comments fa-3x mb-3"></i>
                                    <p>Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                                </div>
                            @endif

                            <!-- Comment Form -->
                            <div class="comment-form">
                                <h4 class="mb-3">Tinggalkan Komentar</h4>
                                <form action="{{ route('blog.comment.store', $post) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Anda" value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Anda" value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Tulis komentar Anda di sini..." required>{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if(\App\Models\Setting::getValue('captcha_enabled', 0) && \App\Models\Setting::getValue('captcha_site_key'))
                                        <div class="mb-3">
                                            @php
                                                $captchaType = \App\Models\Setting::getValue('captcha_type');
                                                $captchaSiteKey = \App\Models\Setting::getValue('captcha_site_key');
                                            @endphp

                                            @if($captchaType == 'recaptcha')
                                                <div class="g-recaptcha" data-sitekey="{{ $captchaSiteKey }}"></div>
                                            @elseif($captchaType == 'hcaptcha')
                                                <div class="h-captcha" data-sitekey="{{ $captchaSiteKey }}"></div>
                                            @elseif($captchaType == 'turnstile')
                                                <div class="cf-turnstile" data-sitekey="{{ $captchaSiteKey }}"></div>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-paper-plane me-2"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

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

@push('scripts')
@if(\App\Models\Setting::getValue('captcha_enabled', 0) && \App\Models\Setting::getValue('captcha_site_key'))
    @php
        $captchaType = \App\Models\Setting::getValue('captcha_type');
    @endphp

    @if($captchaType == 'recaptcha')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @elseif($captchaType == 'hcaptcha')
        <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    @elseif($captchaType == 'turnstile')
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endif
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show reply form
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.getElementById(`reply-form-${commentId}`).classList.remove('d-none');
                this.classList.add('d-none');
            });
        });

        // Hide reply form
        document.querySelectorAll('.cancel-reply').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.getElementById(`reply-form-${commentId}`).classList.add('d-none');
                document.querySelector(`.reply-btn[data-comment-id="${commentId}"]`).classList.remove('d-none');
            });
        });

        // Scroll to comment if hash exists
        if (window.location.hash && window.location.hash.startsWith('#comment-')) {
            const commentId = window.location.hash;
            const commentElement = document.querySelector(commentId);
            if (commentElement) {
                commentElement.scrollIntoView();
                commentElement.classList.add('bg-light');
                setTimeout(() => {
                    commentElement.classList.remove('bg-light');
                }, 3000);
            }
        }
    });
</script>
@endpush
