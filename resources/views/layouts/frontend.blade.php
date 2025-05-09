<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Megantronik') }} - @yield('title', 'Server Pulsa H2H')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="bg-primary py-2 d-none d-md-block text-white">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                    <div class="d-flex gap-3">
                        <div>
                            <i class="fas fa-phone-alt me-2 text-info"></i>
                            <span>+62 123 4567 890</span>
                        </div>
                        <div>
                            <i class="fas fa-envelope me-2 text-info"></i>
                            <span>info@megantronik.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://placehold.co/200x80/0066cc/ffffff?text=Megantronik" alt="Megantronik Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-info-circle me-1"></i> Tentang Kami
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active fw-bold' : '' }}" href="{{ route('services') }}">
                            <i class="fas fa-cogs me-1"></i> Layanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products') ? 'active fw-bold' : '' }}" href="{{ route('products') }}">
                            <i class="fas fa-box me-1"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog.*') ? 'active fw-bold' : '' }}" href="{{ route('blog.index') }}">
                            <i class="fas fa-blog me-1"></i> Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-bold' : '' }}" href="{{ route('contact') }}">
                            <i class="fas fa-envelope me-1"></i> Kontak
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary btn-sm" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mb-4">
                        <img src="https://placehold.co/200x80/0066cc/ffffff?text=Megantronik" alt="Megantronik Logo" height="40" class="bg-white p-1 rounded">
                    </div>
                    <p class="text-muted mb-4">Server Pulsa H2H terpercaya dengan layanan terbaik dan harga kompetitif. Kami menyediakan berbagai produk digital untuk memenuhi kebutuhan bisnis Anda.</p>
                    <div class="social-icons d-flex gap-2">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2 small text-primary"></i> Beranda</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right me-2 small text-primary"></i> Tentang Kami</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right me-2 small text-primary"></i> Layanan</a></li>
                        <li><a href="{{ route('products') }}"><i class="fas fa-chevron-right me-2 small text-primary"></i> Produk</a></li>
                        <li><a href="{{ route('blog.index') }}"><i class="fas fa-chevron-right me-2 small text-primary"></i> Blog</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right me-2 small text-primary"></i> Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <ul class="footer-links">
                        <li class="d-flex mb-3">
                            <div class="icon-box me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span>Jl. Contoh No. 123, Kota, Indonesia</span>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="icon-box me-3">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <span>+62 123 4567 890</span>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="icon-box me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span>info@megantronik.com</span>
                        </li>
                        <li class="d-flex">
                            <div class="icon-box me-3">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <span>Senin - Jumat: 08:00 - 17:00</span><br>
                                <span>Sabtu: 09:00 - 15:00</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4 border-secondary">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0 text-muted">&copy; {{ date('Y') }} <span class="text-white fw-bold">Megantronik</span>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    @stack('scripts')
</body>
</html>
