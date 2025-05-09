@extends('layouts.frontend')

@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=About+Us" alt="About Hero" class="w-100 h-100 object-fit-cover opacity-25">
        </div>
        <div class="container position-relative py-5 py-md-6 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold text-white mb-4">Tentang Kami</h1>
                    <p class="lead text-white-50 mb-0">
                        Mengenal lebih dekat Megantronik, server pulsa H2H terpercaya di Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Content -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            @if($about)
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold mb-4">{{ $about->title }}</h2>
                        <div class="text-muted">
                            {!! nl2br(e($about->content)) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if($about->image)
                            <img src="{{ $about->image }}" alt="About Megantronik" class="img-fluid rounded shadow">
                        @else
                            <img src="https://placehold.co/800x600/0066cc/ffffff?text=About+Megantronik" alt="About Megantronik" class="img-fluid rounded shadow">
                        @endif
                    </div>
                </div>

                <!-- Vision & Mission -->
                <div class="row g-4 mt-5">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm bg-light">
                            <div class="card-body p-4 p-lg-5">
                                <h3 class="card-title fw-bold mb-4">Visi</h3>
                                <p class="card-text text-muted">
                                    {{ $about->vision ?? 'Menjadi server pulsa H2H terdepan di Indonesia yang memberikan layanan terbaik dan terpercaya untuk semua mitra.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm bg-light">
                            <div class="card-body p-4 p-lg-5">
                                <h3 class="card-title fw-bold mb-4">Misi</h3>
                                <p class="card-text text-muted">
                                    {{ $about->mission ?? 'Menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7 untuk membantu mitra kami tumbuh dan berkembang.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History -->
                @if($about->history)
                    <div class="mt-5">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 p-lg-5">
                                <h3 class="card-title fw-bold mb-4">Sejarah Kami</h3>
                                <div class="text-muted">
                                    {!! nl2br(e($about->history)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-4">
                    <h2 class="display-5 fw-bold mb-4">Tentang Megantronik</h2>
                    <p class="lead text-muted mb-5">
                        Megantronik adalah server pulsa H2H terpercaya di Indonesia yang menyediakan berbagai layanan untuk kebutuhan bisnis Anda. Kami berkomitmen untuk memberikan layanan terbaik dengan harga kompetitif, transaksi cepat, dan dukungan 24/7.
                    </p>
                    <div class="mb-5">
                        <img src="https://placehold.co/800x600/0066cc/ffffff?text=About+Megantronik" alt="About Megantronik" class="img-fluid rounded shadow mx-auto">
                    </div>

                    <div class="row g-4 mt-5 justify-content-center">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm bg-light">
                                <div class="card-body p-4 p-lg-5">
                                    <h3 class="card-title fw-bold mb-4">Visi</h3>
                                    <p class="card-text text-muted">
                                        Menjadi server pulsa H2H terdepan di Indonesia yang memberikan layanan terbaik dan terpercaya untuk semua mitra.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm bg-light">
                                <div class="card-body p-4 p-lg-5">
                                    <h3 class="card-title fw-bold mb-4">Misi</h3>
                                    <p class="card-text text-muted">
                                        Menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7 untuk membantu mitra kami tumbuh dan berkembang.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Tim Kami</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Kenali tim profesional di balik kesuksesan Megantronik.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <img src="https://placehold.co/400x400/0066cc/ffffff?text=CEO" alt="CEO" class="card-img-top" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title mb-1">John Doe</h4>
                            <p class="text-primary small mb-3">CEO & Founder</p>
                            <p class="card-text text-muted">
                                Memiliki pengalaman lebih dari 10 tahun di industri telekomunikasi dan teknologi.
                            </p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <img src="https://placehold.co/400x400/0066cc/ffffff?text=CTO" alt="CTO" class="card-img-top" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title mb-1">Jane Smith</h4>
                            <p class="text-primary small mb-3">CTO</p>
                            <p class="card-text text-muted">
                                Ahli teknologi dengan keahlian dalam pengembangan sistem server dan infrastruktur.
                            </p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        <img src="https://placehold.co/400x400/0066cc/ffffff?text=COO" alt="COO" class="card-img-top" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title mb-1">David Johnson</h4>
                            <p class="text-primary small mb-3">COO</p>
                            <p class="card-text text-muted">
                                Berpengalaman dalam operasional bisnis dan pengembangan strategi perusahaan.
                            </p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1"><i class="fas fa-envelope"></i></a>
                            </div>
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
                    <h2 class="display-5 fw-bold mb-2">Tertarik untuk bekerja sama?</h2>
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
