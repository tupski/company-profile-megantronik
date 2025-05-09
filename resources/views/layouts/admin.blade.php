<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Megantronik') }} | @yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white" style="width: 250px; min-height: 100vh; position: fixed; top: 0; left: 0; z-index: 100;">
            <div class="d-flex align-items-center justify-content-center py-4 border-bottom border-secondary">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                    <span class="fs-4 fw-bold text-white">Megantronik</span>
                </a>
            </div>

            <div class="p-3">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-cogs me-2"></i>
                            <span>Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-box me-2"></i>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-comment-dots me-2"></i>
                            <span>Testimoni</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.about.index') }}" class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-info-circle me-2"></i>
                            <span>Tentang Kami</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-envelope me-2"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : 'text-white' }} d-flex align-items-center"
                           data-bs-toggle="collapse" href="#blogSubmenu" role="button"
                           aria-expanded="{{ request()->routeIs('admin.blog.*') ? 'true' : 'false' }}"
                           aria-controls="blogSubmenu">
                            <i class="fas fa-blog me-2"></i>
                            <span>Blog</span>
                            <i class="fas fa-chevron-down ms-auto small"></i>
                        </a>
                        <div class="collapse {{ request()->routeIs('admin.blog.*') ? 'show' : '' }}" id="blogSubmenu">
                            <ul class="nav flex-column ms-3 mt-2">
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.posts.index') }}"
                                       class="nav-link {{ request()->routeIs('admin.blog.posts.index') ? 'text-primary' : 'text-white-50' }} py-1">
                                        <i class="fas fa-list-ul me-2"></i> Semua
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.posts.create') }}"
                                       class="nav-link {{ request()->routeIs('admin.blog.posts.create') ? 'text-primary' : 'text-white-50' }} py-1">
                                        <i class="fas fa-plus me-2"></i> Tambah
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.categories.index') }}"
                                       class="nav-link {{ request()->routeIs('admin.blog.categories.*') ? 'text-primary' : 'text-white-50' }} py-1">
                                        <i class="fas fa-folder me-2"></i> Kategori
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.tags.index') }}"
                                       class="nav-link {{ request()->routeIs('admin.blog.tags.*') ? 'text-primary' : 'text-white-50' }} py-1">
                                        <i class="fas fa-tags me-2"></i> Tag
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : 'text-white' }} d-flex align-items-center">
                            <i class="fas fa-cog me-2"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                </ul>

                <hr class="my-4 border-secondary">

                <div class="d-grid gap-2">
                    <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i> Lihat Website
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content" style="margin-left: 250px; width: calc(100% - 250px);">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
                <div class="container-fluid px-4">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Keluar</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="p-4">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white text-center p-3 border-top">
                <p class="mb-0 text-muted">&copy; {{ date('Y') }} {{ config('app.name', 'Megantronik') }}. All rights reserved.</p>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
