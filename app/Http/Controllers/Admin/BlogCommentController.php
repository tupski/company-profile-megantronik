<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogComment::with(['post', 'user', 'parent']);

        // Filter by approval status
        if ($request->has('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        // Filter by post
        if ($request->has('post_id') && $request->post_id) {
            $query->where('blog_post_id', $request->post_id);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $comments = $query->latest()->paginate(15);
        $posts = BlogPost::all();

        return view('admin.blog.comments.index', compact('comments', 'posts'));
    }

    /**
     * Approve a comment.
     */
    public function approve(BlogComment $comment)
    {
        $comment->update(['is_approved' => true]);

        return redirect()->route('admin.blog-comments.index')
            ->with('success', 'Komentar berhasil disetujui.');
    }

    /**
     * Unapprove a comment.
     */
    public function unapprove(BlogComment $comment)
    {
        $comment->update(['is_approved' => false]);

        return redirect()->route('admin.blog-comments.index')
            ->with('success', 'Komentar berhasil dibatalkan persetujuannya.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComment $comment)
    {
        $comment->load(['post', 'user', 'parent', 'replies']);

        return view('admin.blog.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComment $comment)
    {
        return view('admin.blog.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogComment $comment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'is_approved' => 'boolean',
        ]);

        $comment->update($request->all());

        return redirect()->route('admin.blog-comments.index')
            ->with('success', 'Komentar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.blog-comments.index')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}
