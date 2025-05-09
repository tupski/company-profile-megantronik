@extends('layouts.frontend')

@section('title', 'Layanan')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-blue-600">
        <div class="absolute inset-0">
            <img src="https://placehold.co/1920x1080/0066cc/ffffff?text=Services" alt="Services Hero" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 lg:py-20 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Layanan Kami
            </h1>
            <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                Kami menyediakan berbagai layanan untuk memenuhi kebutuhan bisnis Anda.
            </p>
        </div>
    </div>

    <!-- Services List -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Solusi Lengkap untuk Bisnis Anda
                </h2>
                <p class="mt-4 text-xl text-gray-500">
                    Megantronik menyediakan berbagai layanan server pulsa H2H yang dapat disesuaikan dengan kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse($services as $service)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="relative">
                            @if($service->image)
                                <img src="{{ $service->image }}" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                            @else
                                <img src="https://placehold.co/600x400/0066cc/ffffff?text=Service" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                            @endif
                        </div>
                        <div class="px-6 py-8">
                            <div class="flex items-center mb-4">
                                @if($service->icon)
                                    <div class="text-blue-500 text-3xl mr-3">
                                        <i class="{{ $service->icon }}"></i>
                                    </div>
                                @else
                                    <div class="bg-blue-500 p-3 rounded-full mr-3">
                                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <h3 class="text-xl font-bold text-gray-900">{{ $service->title }}</h3>
                            </div>
                            <div class="text-gray-600 mb-6">
                                {!! nl2br(e($service->description)) !!}
                            </div>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Belum ada layanan yang tersedia.</p>
                        <p class="mt-4 text-gray-500">Silakan kembali lagi nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Bagaimana Cara Kerjanya?
                </h2>
                <p class="mt-4 text-xl text-gray-500">
                    Proses sederhana untuk mulai menggunakan layanan kami.
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-gray-50 px-3 text-lg font-medium text-gray-900">
                        Langkah-langkah
                    </span>
                </div>
            </div>

            <div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-3 lg:max-w-none">
                <div class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0 bg-blue-500 p-6 flex items-center justify-center">
                        <span class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-blue-500 text-xl font-bold">1</span>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Daftar</h3>
                            <p class="mt-3 text-base text-gray-500">
                                Hubungi kami untuk mendaftar dan membuat akun di sistem kami. Kami akan membantu Anda melalui proses pendaftaran.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0 bg-blue-500 p-6 flex items-center justify-center">
                        <span class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-blue-500 text-xl font-bold">2</span>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Deposit</h3>
                            <p class="mt-3 text-base text-gray-500">
                                Lakukan deposit ke rekening kami. Setelah konfirmasi, saldo Anda akan segera diperbarui di sistem.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0 bg-blue-500 p-6 flex items-center justify-center">
                        <span class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-blue-500 text-xl font-bold">3</span>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Transaksi</h3>
                            <p class="mt-3 text-base text-gray-500">
                                Mulai bertransaksi melalui sistem kami. Anda dapat melakukan transaksi melalui API, aplikasi, atau web panel.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="mt-4 text-xl text-gray-500">
                    Jawaban untuk pertanyaan umum tentang layanan kami.
                </p>
            </div>

            <div class="mt-12 max-w-3xl mx-auto">
                <dl class="space-y-6 divide-y divide-gray-200">
                    <div class="pt-6">
                        <dt class="text-lg font-medium text-gray-900">
                            Apa itu server pulsa H2H?
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">
                            Server pulsa H2H (Host to Host) adalah sistem yang menghubungkan langsung antara server penyedia dengan server pengguna, memungkinkan transaksi pulsa dan produk digital lainnya secara otomatis dan real-time.
                        </dd>
                    </div>

                    <div class="pt-6">
                        <dt class="text-lg font-medium text-gray-900">
                            Bagaimana cara mendaftar?
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">
                            Anda dapat mendaftar dengan menghubungi kami melalui halaman kontak atau nomor telepon yang tersedia. Tim kami akan membantu Anda melalui proses pendaftaran.
                        </dd>
                    </div>

                    <div class="pt-6">
                        <dt class="text-lg font-medium text-gray-900">
                            Berapa minimal deposit?
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">
                            Minimal deposit bervariasi tergantung pada paket yang Anda pilih. Silakan hubungi kami untuk informasi lebih lanjut.
                        </dd>
                    </div>

                    <div class="pt-6">
                        <dt class="text-lg font-medium text-gray-900">
                            Apakah ada biaya pendaftaran?
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">
                            Tidak, pendaftaran di Megantronik gratis. Anda hanya perlu melakukan deposit untuk mulai bertransaksi.
                        </dd>
                    </div>

                    <div class="pt-6">
                        <dt class="text-lg font-medium text-gray-900">
                            Bagaimana jika terjadi gangguan?
                        </dt>
                        <dd class="mt-2 text-base text-gray-500">
                            Tim dukungan kami siap membantu Anda 24/7. Anda dapat menghubungi kami melalui nomor telepon, email, atau fitur live chat yang tersedia.
                        </dd>
                    </div>
                </dl>
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
