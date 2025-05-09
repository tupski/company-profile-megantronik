@extends('layouts.frontend')

@section('title', 'Layanan')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Services" alt="Services Hero" class="w-100 h-100 object-fit-cover opacity-25">
        </div>
        <div class="container position-relative py-5 py-md-6 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold text-white mb-4">Layanan Kami</h1>
                    <p class="lead text-white-50 mb-0">
                        Kami menyediakan berbagai layanan untuk memenuhi kebutuhan bisnis Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Services List -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Solusi Lengkap untuk Bisnis Anda</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Megantronik menyediakan berbagai layanan server pulsa H2H yang dapat disesuaikan dengan kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow card-hover">
                            <div class="position-relative">
                                @if($service->image)
                                    <img src="{{ $service->image }}" alt="{{ $service->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="https://placehold.co/600x400/0066cc/ffffff?text=Service" alt="{{ $service->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    @if($service->icon)
                                        <div class="text-primary fs-3 me-3">
                                            <i class="{{ $service->icon }}"></i>
                                        </div>
                                    @else
                                        <div class="bg-primary p-2 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-cogs text-white"></i>
                                        </div>
                                    @endif
                                    <h4 class="card-title mb-0">{{ $service->title }}</h4>
                                </div>
                                <div class="card-text text-muted mb-4">
                                    {!! nl2br(e($service->description)) !!}
                                </div>
                                <a href="{{ route('contact') }}" class="btn btn-primary">
                                    <i class="fas fa-headset me-2"></i> Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">Belum ada layanan yang tersedia.</p>
                        <p class="text-muted mt-3">Silakan kembali lagi nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Bagaimana Cara Kerjanya?</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Proses sederhana untuk mulai menggunakan layanan kami.
                </p>
            </div>

            <div class="position-relative mb-5">
                <hr class="text-secondary">
                <div class="position-absolute top-50 start-50 translate-middle bg-light px-3">
                    <h5 class="text-secondary fw-bold mb-0">Langkah-langkah</h5>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <span class="d-inline-flex align-items-center justify-content-center bg-white text-primary rounded-circle fw-bold fs-4" style="width: 50px; height: 50px;">1</span>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold mb-3">Daftar</h4>
                            <p class="card-text text-muted">
                                Hubungi kami untuk mendaftar dan membuat akun di sistem kami. Kami akan membantu Anda melalui proses pendaftaran.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <span class="d-inline-flex align-items-center justify-content-center bg-white text-primary rounded-circle fw-bold fs-4" style="width: 50px; height: 50px;">2</span>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold mb-3">Deposit</h4>
                            <p class="card-text text-muted">
                                Lakukan deposit ke rekening kami. Setelah konfirmasi, saldo Anda akan segera diperbarui di sistem.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <span class="d-inline-flex align-items-center justify-content-center bg-white text-primary rounded-circle fw-bold fs-4" style="width: 50px; height: 50px;">3</span>
                        </div>
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold mb-3">Transaksi</h4>
                            <p class="card-text text-muted">
                                Mulai bertransaksi melalui sistem kami. Anda dapat melakukan transaksi melalui API, aplikasi, atau web panel.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Pertanyaan yang Sering Diajukan</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Jawaban untuk pertanyaan umum tentang layanan kami.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu server pulsa H2H?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Server pulsa H2H (Host to Host) adalah sistem yang menghubungkan langsung antara server penyedia dengan server pengguna, memungkinkan transaksi pulsa dan produk digital lainnya secara otomatis dan real-time.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana cara mendaftar?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Anda dapat mendaftar dengan menghubungi kami melalui halaman kontak atau nomor telepon yang tersedia. Tim kami akan membantu Anda melalui proses pendaftaran.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Berapa minimal deposit?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Minimal deposit bervariasi tergantung pada paket yang Anda pilih. Silakan hubungi kami untuk informasi lebih lanjut.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Apakah ada biaya pendaftaran?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Tidak, pendaftaran di Megantronik gratis. Anda hanya perlu melakukan deposit untuk mulai bertransaksi.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Bagaimana jika terjadi gangguan?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Tim dukungan kami siap membantu Anda 24/7. Anda dapat menghubungi kami melalui nomor telepon, email, atau fitur live chat yang tersedia.
                                </div>
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
