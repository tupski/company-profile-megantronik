<x-guest-layout>
    <h4 class="text-center mb-4 fw-bold">Konfirmasi Password</h4>

    <div class="alert alert-warning mb-4">
        Ini adalah area aman dari aplikasi. Harap konfirmasi password Anda sebelum melanjutkan.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-check-circle me-2"></i> Konfirmasi
            </button>
        </div>
    </form>
</x-guest-layout>
