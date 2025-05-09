<x-guest-layout>
    <h4 class="text-center mb-4 fw-bold">Verifikasi Email</h4>

    <div class="alert alert-info mb-4">
        Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan kepada Anda? Jika Anda tidak menerima email, kami akan dengan senang hati mengirimkan email lain.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4">
            Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-md-6 mb-3 mb-md-0">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-envelope me-2"></i> Kirim Ulang Email Verifikasi
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
