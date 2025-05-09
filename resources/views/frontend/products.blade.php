@extends('layouts.frontend')

@section('title', 'Produk')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Products" alt="Products Hero" class="w-100 h-100 object-fit-cover opacity-25">
        </div>
        <div class="container position-relative py-5 py-md-6 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold text-white mb-4">Produk Kami</h1>
                    <p class="lead text-white-50 mb-0">
                        Berbagai produk digital berkualitas dengan harga kompetitif.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products List -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Produk Digital Terlengkap</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Megantronik menyediakan berbagai produk digital untuk memenuhi kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card h-100 border-0 shadow card-hover">
                            <div class="position-relative">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="https://placehold.co/600x400/0066cc/ffffff?text=Product" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @endif
                                @if($product->is_featured)
                                    <div class="position-absolute top-0 end-0 bg-warning text-dark px-2 py-1 m-2 rounded-pill">
                                        <small class="fw-bold">UNGGULAN</small>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-2">{{ $product->name }}</h5>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                                @if($product->price)
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="fs-5 fw-bold text-primary">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @endif
                                <a href="{{ route('contact') }}" class="btn btn-primary w-100">
                                    <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">Belum ada produk yang tersedia.</p>
                        <p class="text-muted mt-3">Silakan kembali lagi nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Product Categories -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Kategori Produk</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Berbagai kategori produk yang kami sediakan.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="mx-auto mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle p-3 shadow">
                                <i class="fas fa-mobile-alt text-white fs-3"></i>
                            </div>
                        </div>
                        <h4 class="card-title mb-3">Pulsa All Operator</h4>
                        <p class="card-text text-muted">
                            Pulsa untuk semua operator seluler di Indonesia dengan harga kompetitif.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="mx-auto mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle p-3 shadow">
                                <i class="fas fa-wifi text-white fs-3"></i>
                            </div>
                        </div>
                        <h4 class="card-title mb-3">Paket Data</h4>
                        <p class="card-text text-muted">
                            Paket data internet untuk semua operator dengan berbagai pilihan kuota.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="mx-auto mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle p-3 shadow">
                                <i class="fas fa-bolt text-white fs-3"></i>
                            </div>
                        </div>
                        <h4 class="card-title mb-3">Token PLN</h4>
                        <p class="card-text text-muted">
                            Token listrik PLN dengan berbagai nominal dan proses cepat.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="mx-auto mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle p-3 shadow">
                                <i class="fas fa-gamepad text-white fs-3"></i>
                            </div>
                        </div>
                        <h4 class="card-title mb-3">Voucher Game</h4>
                        <p class="card-text text-muted">
                            Voucher game online untuk berbagai platform gaming populer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Mengapa Memilih Produk Kami?</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Keunggulan produk-produk Megantronik.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm bg-light">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-bolt text-white"></i>
                                </div>
                                <h4 class="card-title mb-0 fw-bold">Proses Cepat</h4>
                            </div>
                            <p class="card-text text-muted">
                                Transaksi diproses secara instan dan otomatis, memastikan pelanggan Anda mendapatkan produk dengan cepat.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm bg-light">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-hand-holding-usd text-white"></i>
                                </div>
                                <h4 class="card-title mb-0 fw-bold">Harga Kompetitif</h4>
                            </div>
                            <p class="card-text text-muted">
                                Kami menawarkan harga yang kompetitif untuk semua produk, membantu Anda memaksimalkan keuntungan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm bg-light">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <h4 class="card-title mb-0 fw-bold">Produk Berkualitas</h4>
                            </div>
                            <p class="card-text text-muted">
                                Semua produk kami dijamin berkualitas dan berasal dari sumber resmi, memberikan keamanan dan kepercayaan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-2">Tertarik dengan produk kami?</h2>
                    <p class="lead text-white-50">Hubungi kami sekarang juga.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4 shadow-sm">
                        <i class="fas fa-headset me-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
