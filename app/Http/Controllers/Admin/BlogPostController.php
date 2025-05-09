<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::with(['category', 'user'])
            ->latest()
            ->paginate(10);

        return view('admin.blog.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'content' => 'required',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->title);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/blog', $imageName);
            $data['featured_image'] = 'storage/blog/' . $imageName;
        }

        // Set published_at if post is published
        if ($request->is_published) {
            $data['published_at'] = now();
        }

        // Create post
        $post = BlogPost::create($data);

        // Attach tags
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.blog.posts.index')
            ->with('success', 'Post berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $post)
    {
        $post->load(['category', 'tags', 'user']);

        return view('admin.blog.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $post)
    {
        $post->load(['category', 'tags']);
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        return view('admin.blog.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'content' => 'required',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $data = $request->all();

        // Only update slug if title has changed
        if ($post->title !== $request->title) {
            $data['slug'] = Str::slug($request->title);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image && Storage::exists('public/' . str_replace('storage/', '', $post->featured_image))) {
                Storage::delete('public/' . str_replace('storage/', '', $post->featured_image));
            }

            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/blog', $imageName);
            $data['featured_image'] = 'storage/blog/' . $imageName;
        }

        // Set published_at if post is being published for the first time
        if ($request->is_published && !$post->published_at) {
            $data['published_at'] = now();
        }

        // Update post
        $post->update($data);

        // Sync tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.blog.posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $post)
    {
        // Delete featured image if exists
        if ($post->featured_image && Storage::exists('public/' . str_replace('storage/', '', $post->featured_image))) {
            Storage::delete('public/' . str_replace('storage/', '', $post->featured_image));
        }

        // Delete post
        $post->delete();

        return redirect()->route('admin.blog.posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
