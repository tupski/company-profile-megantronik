@extends('layouts.admin')

@section('title', 'Detail Komentar')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Komentar</h1>
        <a href="{{ route('admin.blog-comments.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Komentar</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">Komentar</h5>
                        <p class="mb-0">{{ $comment->content }}</p>
                    </div>

                    @if($comment->parent)
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Balasan Untuk</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="fw-bold">{{ $comment->parent->name }}</span>
                                            <span class="text-muted ms-2">{{ $comment->parent->created_at->format('d M Y H:i') }}</span>
                                        </div>
                                        <a href="{{ route('admin.blog-comments.show', $comment->parent) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i> Lihat
                                        </a>
                                    </div>
                                    <p class="mb-0">{{ $comment->parent->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($comment->replies->count() > 0)
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Balasan ({{ $comment->replies->count() }})</h5>
                            @foreach($comment->replies as $reply)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <div>
                                                <span class="fw-bold">{{ $reply->name }}</span>
                                                <span class="text-muted ms-2">{{ $reply->created_at->format('d M Y H:i') }}</span>
                                                @if($reply->is_approved)
                                                    <span class="badge bg-success ms-2">Disetujui</span>
                                                @else
                                                    <span class="badge bg-warning ms-2">Menunggu</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('admin.blog-comments.show', $reply) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-1"></i> Lihat
                                            </a>
                                        </div>
                                        <p class="mb-0">{{ $reply->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="d-flex mt-4">
                        <a href="{{ route('admin.blog-comments.edit', $comment) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        @if($comment->is_approved)
                            <form action="{{ route('admin.blog-comments.unapprove', $comment) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning me-2">
                                    <i class="fas fa-times me-1"></i> Batalkan Persetujuan
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.blog-comments.approve', $comment) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success me-2">
                                    <i class="fas fa-check me-1"></i> Setujui
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('admin.blog-comments.destroy', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pengirim</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="fw-bold">Nama</h6>
                        <p>{{ $comment->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Email</h6>
                        <p>{{ $comment->email }}</p>
                    </div>
                    @if($comment->user)
                        <div class="mb-3">
                            <h6 class="fw-bold">User</h6>
                            <p>{{ $comment->user->name }} (ID: {{ $comment->user->id }})</p>
                        </div>
                    @endif
                    <div class="mb-3">
                        <h6 class="fw-bold">IP Address</h6>
                        <p>{{ $comment->ip_address ?? 'Tidak tersedia' }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">User Agent</h6>
                        <p class="small text-muted">{{ $comment->user_agent ?? 'Tidak tersedia' }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Tanggal</h6>
                        <p>{{ $comment->created_at->format('d M Y H:i:s') }}</p>
                    </div>
                    <div class="mb-0">
                        <h6 class="fw-bold">Status</h6>
                        @if($comment->is_approved)
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-warning">Menunggu</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Post</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="fw-bold">Judul</h6>
                        <p>{{ $comment->post->title }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Kategori</h6>
                        <p>{{ $comment->post->category->name }}</p>
                    </div>
                    <div class="mb-0">
                        <a href="{{ route('blog.show', $comment->post->slug) }}#comment-{{ $comment->id }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fas fa-external-link-alt me-1"></i> Lihat di Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
