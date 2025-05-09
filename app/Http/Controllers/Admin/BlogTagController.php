<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = BlogTag::withCount('posts')->paginate(20);
        return view('admin.blog.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_tags,name',
        ]);

        BlogTag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.blog.tags.index')
            ->with('success', 'Tag berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogTag $tag)
    {
        $tag->load(['posts' => function($query) {
            $query->latest()->paginate(10);
        }]);

        return view('admin.blog.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogTag $tag)
    {
        return view('admin.blog.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogTag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.blog.tags.index')
            ->with('success', 'Tag berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogTag $tag)
    {
        // Check if tag has posts
        if ($tag->posts()->count() > 0) {
            return redirect()->route('admin.blog.tags.index')
                ->with('error', 'Tag tidak dapat dihapus karena masih digunakan oleh post.');
        }

        $tag->delete();

        return redirect()->route('admin.blog.tags.index')
            ->with('success', 'Tag berhasil dihapus.');
    }
}
