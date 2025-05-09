@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Blog Post</h1>
        <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Post</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog-posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Ringkasan</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Ringkasan singkat dari post (opsional). Jika dikosongkan, akan diambil dari konten.</div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" name="content" rows="10">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Publikasi</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Publikasikan</label>
                                    </div>
                                    <div class="form-text">Jika tidak dicentang, post akan disimpan sebagai draft.</div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">Featured Post</label>
                                    </div>
                                    <div class="form-text">Post akan ditampilkan di bagian featured.</div>
                                </div>
                                <div class="mb-0">
                                    <p class="mb-1 text-muted small">
                                        <i class="fas fa-user me-1"></i> Dibuat oleh: {{ $post->user->name }}
                                    </p>
                                    <p class="mb-1 text-muted small">
                                        <i class="fas fa-calendar me-1"></i> Dibuat pada: {{ $post->created_at->format('d M Y H:i') }}
                                    </p>
                                    @if($post->published_at)
                                        <p class="mb-0 text-muted small">
                                            <i class="fas fa-clock me-1"></i> Dipublikasikan pada: {{ $post->published_at->format('d M Y H:i') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Kategori & Tag</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="blog_category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('blog_category_id') is-invalid @enderror" id="blog_category_id" name="blog_category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('blog_category_id', $post->blog_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tag</label>
                                    <select class="form-select @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ (old('tags', $post->tags->pluck('id')->toArray()) && in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Featured Image</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                                    @error('featured_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Gambar utama untuk post (opsional). Ukuran maksimal 2MB.</div>
                                </div>
                                <div class="text-center mt-3 {{ $post->featured_image ? '' : 'd-none' }}" id="image-preview-container">
                                    <img id="image-preview" src="{{ $post->featured_image ? asset($post->featured_image) : '#' }}" alt="Preview" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });

        // Image preview
        document.getElementById('featured_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview-container').classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
