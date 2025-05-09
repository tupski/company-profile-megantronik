@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-blue-600">
        <div class="absolute inset-0">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Megantronik" alt="Hero Background" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 py-24 sm:px-6 lg:px-8 lg:py-32">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Server Pulsa H2H Terpercaya
                </h1>
                <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                    Megantronik menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7.
                </p>
                <div class="mt-10 flex justify-center">
                    <div class="inline-flex rounded-md shadow">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                            Hubungi Kami
                        </a>
                    </div>
                    <div class="ml-3 inline-flex rounded-md shadow">
                        <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 hover:bg-blue-900">
                            Layanan Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Keunggulan</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Mengapa Memilih Megantronik?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Kami menawarkan solusi terbaik untuk kebutuhan server pulsa H2H Anda.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Transaksi Cepat</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    Proses transaksi yang cepat dan efisien, memastikan pelanggan Anda puas dengan layanan yang diberikan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Harga Kompetitif</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    Kami menawarkan harga yang kompetitif untuk semua produk kami, membantu Anda memaksimalkan keuntungan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Dukungan 24/7</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    Tim dukungan kami siap membantu Anda 24/7, memastikan bisnis Anda berjalan lancar tanpa gangguan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Layanan</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Layanan Kami
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Kami menyediakan berbagai layanan untuk memenuhi kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($services as $service)
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                @if($service->icon)
                                    <div class="text-blue-500 text-3xl mb-4">
                                        <i class="{{ $service->icon }}"></i>
                                    </div>
                                @elseif($service->image)
                                    <img src="{{ $service->image }}" alt="{{ $service->title }}" class="h-16 w-16 mb-4">
                                @else
                                    <img src="https://placehold.co/300x200/0066cc/ffffff?text=Service" alt="{{ $service->title }}" class="h-16 w-16 mb-4">
                                @endif
                                <h3 class="text-lg font-medium text-gray-900">{{ $service->title }}</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    {{ Str::limit($service->description, 150) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8">
                            <p class="text-gray-500">Belum ada layanan yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-10 text-center">
                    <a href="{{ route('services') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        Lihat Semua Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Produk</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Produk Unggulan
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Produk-produk terbaik yang kami tawarkan untuk Anda.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    @forelse($products as $product)
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="relative">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                @else
                                    <img src="https://placehold.co/400x300/0066cc/ffffff?text=Product" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                @endif
                                @if($product->is_featured)
                                    <div class="absolute top-0 right-0 bg-yellow-500 text-white px-2 py-1 text-xs font-bold">
                                        UNGGULAN
                                    </div>
                                @endif
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                                @if($product->price)
                                    <p class="mt-4 text-lg font-bold text-blue-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center py-8">
                            <p class="text-gray-500">Belum ada produk yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-10 text-center">
                    <a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Testimoni</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Apa Kata Mereka?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Pendapat pelanggan kami tentang layanan yang kami berikan.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($testimonials as $testimonial)
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center mb-4">
                                    @if($testimonial->image)
                                        <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}" class="h-12 w-12 rounded-full">
                                    @else
                                        <img src="https://placehold.co/200x200/0066cc/ffffff?text=User" alt="{{ $testimonial->name }}" class="h-12 w-12 rounded-full">
                                    @endif
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $testimonial->name }}</h3>
                                        @if($testimonial->position || $testimonial->company)
                                            <p class="text-sm text-gray-500">
                                                {{ $testimonial->position }}{{ $testimonial->position && $testimonial->company ? ', ' : '' }}{{ $testimonial->company }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="h-5 w-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-gray-600 italic">
                                    "{{ $testimonial->content }}"
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8">
                            <p class="text-gray-500">Belum ada testimoni yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Siap untuk memulai?</span>
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
