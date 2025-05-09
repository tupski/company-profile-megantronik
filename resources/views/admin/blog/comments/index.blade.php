@extends('layouts.admin')

@section('title', 'Komentar Blog')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Komentar Blog</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Komentar</h6>
            <div class="d-flex align-items-center">
                <form action="{{ route('admin.blog-comments.index') }}" method="GET" class="d-flex">
                    <div class="input-group me-2">
                        <select name="status" class="form-select form-select-sm">
                            <option value="">Semua Status</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        </select>
                    </div>
                    <div class="input-group me-2">
                        <select name="post_id" class="form-select form-select-sm">
                            <option value="">Semua Post</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}" {{ request('post_id') == $post->id ? 'selected' : '' }}>{{ Str::limit($post->title, 30) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group me-2">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari komentar..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            @if($comments->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Post</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ ($comments->currentPage() - 1) * $comments->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $comment->name }}</div>
                                        <div class="small text-muted">{{ $comment->email }}</div>
                                        @if($comment->user)
                                            <span class="badge bg-info">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ Str::limit($comment->content, 100) }}
                                        @if($comment->parent)
                                            <div class="small text-muted mt-1">
                                                <i class="fas fa-reply me-1"></i> Balasan untuk: {{ Str::limit($comment->parent->content, 50) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.show', $comment->post->slug) }}#comment-{{ $comment->id }}" target="_blank" class="text-decoration-none">
                                            {{ Str::limit($comment->post->title, 30) }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($comment->is_approved)
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-warning">Menunggu</span>
                                        @endif
                                    </td>
                                    <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.blog-comments.show', $comment) }}" class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blog-comments.edit', $comment) }}" class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if($comment->is_approved)
                                                <form action="{{ route('admin.blog-comments.unapprove', $comment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-warning me-1" data-bs-toggle="tooltip" title="Batalkan Persetujuan">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.blog-comments.approve', $comment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-success me-1" data-bs-toggle="tooltip" title="Setujui">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.blog-comments.destroy', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')" data-bs-toggle="tooltip" title="Hapus">
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
                    {{ $comments->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada komentar yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
