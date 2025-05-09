@extends('layouts.frontend')

@section('title', 'Produk')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-blue-600">
        <div class="absolute inset-0">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Products" alt="Products Hero" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-20 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Produk Kami
            </h1>
            <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                Berbagai produk digital berkualitas dengan harga kompetitif.
            </p>
        </div>
    </div>

    <!-- Products List -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Produk Digital Terlengkap
                </h2>
                <p class="mt-4 text-xl text-gray-500">
                    Megantronik menyediakan berbagai produk digital untuk memenuhi kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse($products as $product)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="relative">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @else
                                <img src="https://placehold.co/600x400/0066cc/ffffff?text=Product" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @endif
                            @if($product->is_featured)
                                <div class="absolute top-0 right-0 bg-yellow-500 text-white px-2 py-1 text-xs font-bold">
                                    UNGGULAN
                                </div>
                            @endif
                        </div>
                        <div class="px-6 py-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            @if($product->price)
                                <p class="text-lg font-bold text-blue-600 mb-4">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            @endif
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12">
                        <p class="text-gray-500 text-lg">Belum ada produk yang tersedia.</p>
                        <p class="mt-4 text-gray-500">Silakan kembali lagi nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Product Categories -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Kategori Produk
                </h2>
                <p class="mt-4 text-xl text-gray-500">
                    Berbagai kategori produk yang kami sediakan.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Pulsa All Operator</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Pulsa untuk semua operator seluler di Indonesia dengan harga kompetitif.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Paket Data</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Paket data internet untuk semua operator dengan berbagai pilihan kuota.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Token PLN</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Token listrik PLN dengan berbagai nominal dan proses cepat.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg mb-4">
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Voucher Game</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Voucher game online untuk berbagai platform gaming populer.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Mengapa Memilih Produk Kami?
                </h2>
                <p class="mt-4 text-xl text-gray-500">
                    Keunggulan produk-produk Megantronik.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-blue-50 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-500 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Proses Cepat</h3>
                    </div>
                    <p class="text-gray-600">
                        Transaksi diproses secara instan dan otomatis, memastikan pelanggan Anda mendapatkan produk dengan cepat.
                    </p>
                </div>

                <div class="bg-blue-50 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-500 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Harga Kompetitif</h3>
                    </div>
                    <p class="text-gray-600">
                        Kami menawarkan harga yang kompetitif untuk semua produk, membantu Anda memaksimalkan keuntungan.
                    </p>
                </div>

                <div class="bg-blue-50 p-8 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-500 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Produk Berkualitas</h3>
                    </div>
                    <p class="text-gray-600">
                        Semua produk kami dijamin berkualitas dan berasal dari sumber resmi, memberikan keamanan dan kepercayaan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Tertarik dengan produk kami?</span>
                <span class="block text-blue-200">Hubungi kami sekarang juga.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
