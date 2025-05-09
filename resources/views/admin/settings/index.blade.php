@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Website</h1>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <ul class="nav nav-tabs card-header-tabs" id="settingsTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Umum</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false">Media Sosial</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="blog-tab" data-bs-toggle="tab" data-bs-target="#blog" type="button" role="tab" aria-controls="blog" aria-selected="false">Blog</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="captcha-tab" data-bs-toggle="tab" data-bs-target="#captcha" type="button" role="tab" aria-controls="captcha" aria-selected="false">Captcha</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="settingsTabsContent">
                            <!-- General Settings -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <div class="mb-3">
                                    <label for="site_name" class="form-label">Nama Website <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" value="{{ old('site_name', \App\Models\Setting::getValue('site_name', config('app.name'))) }}" required>
                                    @error('site_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Deskripsi Website</label>
                                    <textarea class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description" rows="3">{{ old('site_description', \App\Models\Setting::getValue('site_description')) }}</textarea>
                                    @error('site_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="site_logo" class="form-label">Logo Website (URL)</label>
                                    <input type="text" class="form-control @error('site_logo') is-invalid @enderror" id="site_logo" name="site_logo" value="{{ old('site_logo', \App\Models\Setting::getValue('site_logo')) }}">
                                    @error('site_logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="site_favicon" class="form-label">Favicon Website (URL)</label>
                                    <input type="text" class="form-control @error('site_favicon') is-invalid @enderror" id="site_favicon" name="site_favicon" value="{{ old('site_favicon', \App\Models\Setting::getValue('site_favicon')) }}">
                                    @error('site_favicon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="site_email" class="form-label">Email Website</label>
                                    <input type="email" class="form-control @error('site_email') is-invalid @enderror" id="site_email" name="site_email" value="{{ old('site_email', \App\Models\Setting::getValue('site_email')) }}">
                                    @error('site_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="site_phone" class="form-label">Telepon Website</label>
                                    <input type="text" class="form-control @error('site_phone') is-invalid @enderror" id="site_phone" name="site_phone" value="{{ old('site_phone', \App\Models\Setting::getValue('site_phone')) }}">
                                    @error('site_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="site_address" class="form-label">Alamat Website</label>
                                    <textarea class="form-control @error('site_address') is-invalid @enderror" id="site_address" name="site_address" rows="3">{{ old('site_address', \App\Models\Setting::getValue('site_address')) }}</textarea>
                                    @error('site_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Social Media Settings -->
                            <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                <div class="mb-3">
                                    <label for="social_facebook" class="form-label">Facebook URL</label>
                                    <input type="text" class="form-control @error('social_facebook') is-invalid @enderror" id="social_facebook" name="social_facebook" value="{{ old('social_facebook', \App\Models\Setting::getValue('social_facebook')) }}">
                                    @error('social_facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="social_twitter" class="form-label">Twitter URL</label>
                                    <input type="text" class="form-control @error('social_twitter') is-invalid @enderror" id="social_twitter" name="social_twitter" value="{{ old('social_twitter', \App\Models\Setting::getValue('social_twitter')) }}">
                                    @error('social_twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="social_instagram" class="form-label">Instagram URL</label>
                                    <input type="text" class="form-control @error('social_instagram') is-invalid @enderror" id="social_instagram" name="social_instagram" value="{{ old('social_instagram', \App\Models\Setting::getValue('social_instagram')) }}">
                                    @error('social_instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="social_linkedin" class="form-label">LinkedIn URL</label>
                                    <input type="text" class="form-control @error('social_linkedin') is-invalid @enderror" id="social_linkedin" name="social_linkedin" value="{{ old('social_linkedin', \App\Models\Setting::getValue('social_linkedin')) }}">
                                    @error('social_linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="social_youtube" class="form-label">YouTube URL</label>
                                    <input type="text" class="form-control @error('social_youtube') is-invalid @enderror" id="social_youtube" name="social_youtube" value="{{ old('social_youtube', \App\Models\Setting::getValue('social_youtube')) }}">
                                    @error('social_youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Blog Settings -->
                            <div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="blog-tab">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="blog_comments_enabled" name="blog_comments_enabled" value="1" {{ old('blog_comments_enabled', \App\Models\Setting::getValue('blog_comments_enabled', 1)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_comments_enabled">Aktifkan Komentar Blog</label>
                                    </div>
                                    <div class="form-text">Jika dinonaktifkan, pengunjung tidak dapat mengirim komentar pada blog.</div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="blog_auto_approve_comments" name="blog_auto_approve_comments" value="1" {{ old('blog_auto_approve_comments', \App\Models\Setting::getValue('blog_auto_approve_comments', 0)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="blog_auto_approve_comments">Otomatis Setujui Komentar</label>
                                    </div>
                                    <div class="form-text">Jika diaktifkan, komentar akan otomatis disetujui tanpa perlu moderasi.</div>
                                </div>
                            </div>
                            
                            <!-- Captcha Settings -->
                            <div class="tab-pane fade" id="captcha" role="tabpanel" aria-labelledby="captcha-tab">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="captcha_enabled" name="captcha_enabled" value="1" {{ old('captcha_enabled', \App\Models\Setting::getValue('captcha_enabled', 0)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="captcha_enabled">Aktifkan Captcha</label>
                                    </div>
                                    <div class="form-text">Jika diaktifkan, captcha akan ditampilkan pada form komentar dan kontak.</div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="captcha_on_login" name="captcha_on_login" value="1" {{ old('captcha_on_login', \App\Models\Setting::getValue('captcha_on_login', 0)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="captcha_on_login">Aktifkan Captcha pada Login</label>
                                    </div>
                                    <div class="form-text">Jika diaktifkan, captcha akan ditampilkan pada form login.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="captcha_type" class="form-label">Jenis Captcha</label>
                                    <select class="form-select @error('captcha_type') is-invalid @enderror" id="captcha_type" name="captcha_type">
                                        <option value="">Pilih Jenis Captcha</option>
                                        <option value="recaptcha" {{ old('captcha_type', \App\Models\Setting::getValue('captcha_type')) == 'recaptcha' ? 'selected' : '' }}>Google reCAPTCHA</option>
                                        <option value="hcaptcha" {{ old('captcha_type', \App\Models\Setting::getValue('captcha_type')) == 'hcaptcha' ? 'selected' : '' }}>hCaptcha</option>
                                        <option value="turnstile" {{ old('captcha_type', \App\Models\Setting::getValue('captcha_type')) == 'turnstile' ? 'selected' : '' }}>Cloudflare Turnstile</option>
                                    </select>
                                    @error('captcha_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="captcha_site_key" class="form-label">Site Key</label>
                                    <input type="text" class="form-control @error('captcha_site_key') is-invalid @enderror" id="captcha_site_key" name="captcha_site_key" value="{{ old('captcha_site_key', \App\Models\Setting::getValue('captcha_site_key')) }}">
                                    @error('captcha_site_key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="captcha_secret_key" class="form-label">Secret Key</label>
                                    <input type="text" class="form-control @error('captcha_secret_key') is-invalid @enderror" id="captcha_secret_key" name="captcha_secret_key" value="{{ old('captcha_secret_key', \App\Models\Setting::getValue('captcha_secret_key')) }}">
                                    @error('captcha_secret_key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tindakan</h6>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-2"></i> Simpan Pengaturan
                        </button>
                    </div>
                </div>
                
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Pengaturan ini akan diterapkan ke seluruh website. Beberapa pengaturan mungkin memerlukan refresh halaman atau restart server untuk diterapkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
