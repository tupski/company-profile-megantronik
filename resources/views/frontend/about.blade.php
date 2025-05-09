@extends('layouts.frontend')

@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-blue-600">
        <div class="absolute inset-0">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=About+Us" alt="About Hero" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-20 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Tentang Kami
            </h1>
            <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                Mengenal lebih dekat Megantronik, server pulsa H2H terpercaya di Indonesia.
            </p>
        </div>
    </div>

    <!-- About Content -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($about)
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="lg:w-1/2 lg:pr-8">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                            {{ $about->title }}
                        </h2>
                        <div class="mt-6 text-gray-500 space-y-4">
                            {!! nl2br(e($about->content)) !!}
                        </div>
                    </div>
                    <div class="mt-8 lg:mt-0 lg:w-1/2">
                        @if($about->image)
                            <img src="{{ $about->image }}" alt="About Megantronik" class="rounded-lg shadow-lg">
                        @else
                            <img src="https://placehold.co/800x600/0066cc/ffffff?text=About+Megantronik" alt="About Megantronik" class="rounded-lg shadow-lg">
                        @endif
                    </div>
                </div>

                <!-- Vision & Mission -->
                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-blue-50 p-8 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                            <p class="text-gray-600">
                                {{ $about->vision ?? 'Menjadi server pulsa H2H terdepan di Indonesia yang memberikan layanan terbaik dan terpercaya untuk semua mitra.' }}
                            </p>
                        </div>
                        <div class="bg-blue-50 p-8 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                            <p class="text-gray-600">
                                {{ $about->mission ?? 'Menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7 untuk membantu mitra kami tumbuh dan berkembang.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- History -->
                @if($about->history)
                    <div class="mt-16">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Sejarah Kami</h3>
                        <div class="text-gray-600 space-y-4">
                            {!! nl2br(e($about->history)) !!}
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Tentang Megantronik
                    </h2>
                    <p class="mt-6 text-gray-500">
                        Megantronik adalah server pulsa H2H terpercaya di Indonesia yang menyediakan berbagai layanan untuk kebutuhan bisnis Anda. Kami berkomitmen untuk memberikan layanan terbaik dengan harga kompetitif, transaksi cepat, dan dukungan 24/7.
                    </p>
                    <div class="mt-8">
                        <img src="https://placehold.co/800x600/0066cc/ffffff?text=About+Megantronik" alt="About Megantronik" class="rounded-lg shadow-lg mx-auto">
                    </div>
                    
                    <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                        <div class="bg-blue-50 p-8 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                            <p class="text-gray-600">
                                Menjadi server pulsa H2H terdepan di Indonesia yang memberikan layanan terbaik dan terpercaya untuk semua mitra.
                            </p>
                        </div>
                        <div class="bg-blue-50 p-8 rounded-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                            <p class="text-gray-600">
                                Menyediakan layanan server pulsa H2H dengan harga kompetitif, transaksi cepat, dan dukungan 24/7 untuk membantu mitra kami tumbuh dan berkembang.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Tim Kami
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Kenali tim profesional di balik kesuksesan Megantronik.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <img src="https://placehold.co/400x400/0066cc/ffffff?text=CEO" alt="CEO" class="w-full h-64 object-cover">
                        <div class="px-4 py-5 sm:p-6 text-center">
                            <h3 class="text-lg font-medium text-gray-900">John Doe</h3>
                            <p class="text-sm text-gray-500">CEO & Founder</p>
                            <p class="mt-4 text-gray-600">
                                Memiliki pengalaman lebih dari 10 tahun di industri telekomunikasi dan teknologi.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <img src="https://placehold.co/400x400/0066cc/ffffff?text=CTO" alt="CTO" class="w-full h-64 object-cover">
                        <div class="px-4 py-5 sm:p-6 text-center">
                            <h3 class="text-lg font-medium text-gray-900">Jane Smith</h3>
                            <p class="text-sm text-gray-500">CTO</p>
                            <p class="mt-4 text-gray-600">
                                Ahli teknologi dengan keahlian dalam pengembangan sistem server dan infrastruktur.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <img src="https://placehold.co/400x400/0066cc/ffffff?text=COO" alt="COO" class="w-full h-64 object-cover">
                        <div class="px-4 py-5 sm:p-6 text-center">
                            <h3 class="text-lg font-medium text-gray-900">David Johnson</h3>
                            <p class="text-sm text-gray-500">COO</p>
                            <p class="mt-4 text-gray-600">
                                Berpengalaman dalam operasional bisnis dan pengembangan strategi perusahaan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Tertarik untuk bekerja sama?</span>
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
