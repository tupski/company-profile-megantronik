@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Megantronik" alt="Hero Background" class="w-100 h-100 object-fit-cover opacity-25">
        </div>
        <div class="container position-relative py-5 py-md-6">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold text-white mb-4">Server Pulsa H2H Terpercaya</h1>
                    <p class="lead text-white-50 mb-5">
                        Megantronik menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4 shadow-sm">
                            <i class="fas fa-headset me-2"></i> Hubungi Kami
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-cogs me-2"></i> Layanan Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase">Keunggulan</h6>
                <h2 class="display-5 fw-bold mb-3">Mengapa Memilih Megantronik?</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Kami menawarkan solusi terbaik untuk kebutuhan server pulsa H2H Anda.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="card-icon mx-auto mb-4">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h4 class="card-title mb-3">Transaksi Cepat</h4>
                            <p class="card-text text-muted">
                                Proses transaksi yang cepat dan efisien, memastikan pelanggan Anda puas dengan layanan yang diberikan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="card-icon mx-auto mb-4">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <h4 class="card-title mb-3">Harga Kompetitif</h4>
                            <p class="card-text text-muted">
                                Kami menawarkan harga yang kompetitif untuk semua produk kami, membantu Anda memaksimalkan keuntungan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <div class="card-body text-center p-4">
                            <div class="card-icon mx-auto mb-4">
                                <i class="fas fa-headset"></i>
                            </div>
                            <h4 class="card-title mb-3">Dukungan 24/7</h4>
                            <p class="card-text text-muted">
                                Tim dukungan kami siap membantu Anda 24/7, memastikan bisnis Anda berjalan lancar tanpa gangguan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase">Layanan</h6>
                <h2 class="display-5 fw-bold mb-3">Layanan Kami</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Kami menyediakan berbagai layanan untuk memenuhi kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm card-hover">
                            <div class="card-body p-4">
                                @if($service->icon)
                                    <div class="text-primary fs-1 mb-3">
                                        <i class="{{ $service->icon }}"></i>
                                    </div>
                                @elseif($service->image)
                                    <img src="{{ $service->image }}" alt="{{ $service->title }}" class="mb-3" style="height: 60px; width: auto;">
                                @else
                                    <img src="https://placehold.co/300x200/0066cc/ffffff?text=Service" alt="{{ $service->title }}" class="mb-3" style="height: 60px; width: auto;">
                                @endif
                                <h4 class="card-title mb-3">{{ $service->title }}</h4>
                                <p class="card-text text-muted">
                                    {{ Str::limit($service->description, 150) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada layanan yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('services') }}" class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-arrow-right me-2"></i> Lihat Semua Layanan
                </a>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase">Produk</h6>
                <h2 class="display-5 fw-bold mb-3">Produk Unggulan</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Produk-produk terbaik yang kami tawarkan untuk Anda.
                </p>
            </div>

            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm card-hover">
                            <div class="position-relative">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="https://placehold.co/400x300/0066cc/ffffff?text=Product" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @endif
                                @if($product->is_featured)
                                    <div class="position-absolute top-0 end-0 bg-warning text-dark px-2 py-1 m-2 rounded-pill">
                                        <small class="fw-bold">UNGGULAN</small>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title mb-2">{{ $product->name }}</h5>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                                @if($product->price)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fs-5 fw-bold text-primary">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                        <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-shopping-cart me-1"></i> Beli
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada produk yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('products') }}" class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-arrow-right me-2"></i> Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase">Testimoni</h6>
                <h2 class="display-5 fw-bold mb-3">Apa Kata Mereka?</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Pendapat pelanggan kami tentang layanan yang kami berikan.
                </p>
            </div>

            <div class="row g-4">
                @forelse($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm card-hover">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    @if($testimonial->image)
                                        <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}" class="rounded-circle me-3" width="60" height="60">
                                    @else
                                        <img src="https://placehold.co/200x200/0066cc/ffffff?text=User" alt="{{ $testimonial->name }}" class="rounded-circle me-3" width="60" height="60">
                                    @endif
                                    <div>
                                        <h5 class="card-title mb-1">{{ $testimonial->name }}</h5>
                                        @if($testimonial->position || $testimonial->company)
                                            <p class="text-muted small mb-0">
                                                {{ $testimonial->position }}{{ $testimonial->position && $testimonial->company ? ', ' : '' }}{{ $testimonial->company }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                                <p class="card-text fst-italic text-muted">
                                    "{{ $testimonial->content }}"
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada testimoni yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-2">Siap untuk memulai?</h2>
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
