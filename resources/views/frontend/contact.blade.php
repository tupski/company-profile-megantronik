@extends('layouts.frontend')

@section('title', 'Kontak')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Contact" alt="Contact Hero" class="w-100 h-100 object-fit-cover opacity-25">
        </div>
        <div class="container position-relative py-5 py-md-6 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold text-white mb-4">Hubungi Kami</h1>
                    <p class="lead text-white-50 mb-0">
                        Kami siap membantu Anda. Jangan ragu untuk menghubungi kami.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-5 bg-white">
        <div class="container py-4">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <h2 class="display-6 fw-bold mb-3">Kirim Pesan</h2>
                    <p class="lead text-muted mb-4">
                        Isi formulir di bawah ini dan kami akan segera menghubungi Anda.
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subjek</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-6">
                    <h2 class="display-6 fw-bold mb-3">Informasi Kontak</h2>
                    <p class="lead text-muted mb-5">
                        Anda juga dapat menghubungi kami melalui informasi di bawah ini.
                    </p>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-map-marker-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="fw-bold">Alamat</h5>
                                            <p class="text-muted mb-0">
                                                Jl. Contoh No. 123<br>
                                                Kota, Provinsi<br>
                                                Indonesia
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-phone-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="fw-bold">Telepon</h5>
                                            <p class="text-muted mb-0">
                                                +62 123 4567 890<br>
                                                +62 098 7654 321
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-envelope text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="fw-bold">Email</h5>
                                            <p class="text-muted mb-0">
                                                info@megantronik.com<br>
                                                support@megantronik.com
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-clock text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="fw-bold">Jam Operasional</h5>
                                            <p class="text-muted mb-0">
                                                Senin - Jumat: 08:00 - 17:00<br>
                                                Sabtu: 09:00 - 15:00<br>
                                                Minggu: Tutup
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-primary rounded-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Lokasi Kami</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Temukan kami di lokasi berikut.
                </p>
            </div>

            <div class="card border-0 shadow">
                <div style="height: 450px;">
                    <img src="https://placehold.co/1200x800/0066cc/ffffff?text=Map" alt="Map" class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
@endsection
