<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\BlogCommentController as AdminBlogCommentController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{tag}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post}/comment', [BlogCommentController::class, 'store'])->name('blog.comment.store');

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Services
    Route::resource('services', ServiceController::class, ['as' => 'admin']);

    // Products
    Route::resource('products', ProductController::class, ['as' => 'admin']);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class, ['as' => 'admin']);

    // About
    Route::resource('about', AboutController::class, ['as' => 'admin']);

    // Contacts
    Route::resource('contacts', ContactController::class, ['as' => 'admin']);

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // Blog
    Route::resource('blog-posts', BlogPostController::class, ['as' => 'admin']);
    Route::resource('blog-categories', BlogCategoryController::class, ['as' => 'admin']);
    Route::resource('blog-tags', BlogTagController::class, ['as' => 'admin']);
    Route::resource('blog-comments', AdminBlogCommentController::class, ['as' => 'admin'])->except(['create', 'store']);
    Route::put('blog-comments/{comment}/approve', [AdminBlogCommentController::class, 'approve'])->name('admin.blog-comments.approve');
    Route::put('blog-comments/{comment}/unapprove', [AdminBlogCommentController::class, 'unapprove'])->name('admin.blog-comments.unapprove');
});

// Profile Routes (moved to admin prefix)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
