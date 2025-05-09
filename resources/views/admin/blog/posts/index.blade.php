@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blog Posts</h1>
        <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Tambah Post
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Post</h6>
            <div class="d-flex align-items-center">
                <form action="{{ route('admin.blog.posts.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari post..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            @if($posts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($post->featured_image)
                                                <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="img-thumbnail me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center me-2" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-image text-secondary"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-bold">{{ $post->title }}</div>
                                                <div class="small text-muted">
                                                    <i class="fas fa-user me-1"></i> {{ $post->user->name }}
                                                    @if($post->is_featured)
                                                        <span class="badge bg-warning ms-1">Featured</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-info me-1" target="_blank" data-bs-toggle="tooltip" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.blog.posts.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus post ini?')" data-bs-toggle="tooltip" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada post yang tersedia.</p>
                    <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Tambah Post
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
