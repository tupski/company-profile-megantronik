@extends('layouts.admin')

@section('title', 'Edit Komentar')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Komentar</h1>
        <a href="{{ route('admin.blog-comments.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Komentar</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog-comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $comment->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $comment->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Komentar <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content', $comment->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_approved" name="is_approved" value="1" {{ old('is_approved', $comment->is_approved) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_approved">Disetujui</label>
                    </div>
                    <div class="form-text">Jika dicentang, komentar akan ditampilkan di website.</div>
                </div>
                
                <div class="mb-3">
                    <h6 class="fw-bold">Informasi Post</h6>
                    <p>
                        <strong>Judul:</strong> {{ $comment->post->title }}<br>
                        <strong>Kategori:</strong> {{ $comment->post->category->name }}
                    </p>
                </div>
                
                @if($comment->parent)
                    <div class="mb-3">
                        <h6 class="fw-bold">Balasan Untuk</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <span class="fw-bold">{{ $comment->parent->name }}</span>
                                        <span class="text-muted ms-2">{{ $comment->parent->created_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>
                                <p class="mb-0">{{ $comment->parent->content }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="d-flex mt-4">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.blog-comments.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
