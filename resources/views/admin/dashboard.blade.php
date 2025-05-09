@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-4 fw-bold">Dashboard</h1>

    <!-- Stats -->
    <div class="row">
        <!-- Stat Card - Services -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-primary text-white p-3 rounded">
                            <i class="fas fa-cogs fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-0">Total Layanan</h6>
                        </div>
                    </div>
                    <h2 class="display-6 fw-bold mb-0">{{ $totalServices }}</h2>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye me-1"></i> Lihat Semua
                    </a>
                </div>
            </div>
        </div>

        <!-- Stat Card - Products -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-success text-white p-3 rounded">
                            <i class="fas fa-box fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-0">Total Produk</h6>
                        </div>
                    </div>
                    <h2 class="display-6 fw-bold mb-0">{{ $totalProducts }}</h2>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-success">
                        <i class="fas fa-eye me-1"></i> Lihat Semua
                    </a>
                </div>
            </div>
        </div>

        <!-- Stat Card - Testimonials -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-warning text-white p-3 rounded">
                            <i class="fas fa-comment-dots fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-0">Total Testimoni</h6>
                        </div>
                    </div>
                    <h2 class="display-6 fw-bold mb-0">{{ $totalTestimonials }}</h2>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-warning">
                        <i class="fas fa-eye me-1"></i> Lihat Semua
                    </a>
                </div>
            </div>
        </div>

        <!-- Stat Card - Contacts -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-danger text-white p-3 rounded">
                            <i class="fas fa-envelope fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-0">Pesan Belum Dibaca</h6>
                        </div>
                    </div>
                    <h2 class="display-6 fw-bold mb-0">{{ $unreadContacts }}</h2>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-eye me-1"></i> Lihat Semua
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Pesan Terbaru</h5>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye me-1"></i> Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestContacts as $contact)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.contacts.show', $contact) }}" class="text-decoration-none fw-medium">
                                                {{ $contact->name }}
                                            </a>
                                        </td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ Str::limit($contact->message, 50) }}</td>
                                        <td><small>{{ $contact->created_at->diffForHumans() }}</small></td>
                                        <td>
                                            @if(!$contact->is_read)
                                                <span class="badge bg-danger">Belum Dibaca</span>
                                            @else
                                                <span class="badge bg-success">Sudah Dibaca</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">Belum ada pesan yang diterima.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-12 mb-4">
            <h4 class="fw-bold">Akses Cepat</h4>
        </div>

        <!-- Tambah Layanan -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-primary text-white p-3 rounded">
                            <i class="fas fa-plus fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold mb-0">Tambah Layanan</h5>
                        </div>
                    </div>
                    <p class="card-text text-muted">
                        Tambahkan layanan baru untuk ditampilkan di website.
                    </p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Layanan
                    </a>
                </div>
            </div>
        </div>

        <!-- Tambah Produk -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-success text-white p-3 rounded">
                            <i class="fas fa-plus fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold mb-0">Tambah Produk</h5>
                        </div>
                    </div>
                    <p class="card-text text-muted">
                        Tambahkan produk baru untuk ditampilkan di website.
                    </p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-1"></i> Tambah Produk
                    </a>
                </div>
            </div>
        </div>

        <!-- Tambah Testimoni -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 bg-warning text-white p-3 rounded">
                            <i class="fas fa-plus fa-fw"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="fw-bold mb-0">Tambah Testimoni</h5>
                        </div>
                    </div>
                    <p class="card-text text-muted">
                        Tambahkan testimoni baru untuk ditampilkan di website.
                    </p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-sm btn-warning text-white">
                        <i class="fas fa-plus me-1"></i> Tambah Testimoni
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
