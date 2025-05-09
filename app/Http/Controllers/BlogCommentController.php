<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\BlogPost;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, BlogPost $post)
    {
        // Check if comments are enabled
        if (!Setting::getValue('blog_comments_enabled', 1)) {
            return redirect()->back()->with('error', 'Komentar saat ini dinonaktifkan.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:blog_comments,id',
        ]);

        $comment = new BlogComment();
        $comment->blog_post_id = $post->id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->parent_id = $request->parent_id;
        $comment->ip_address = $request->ip();
        $comment->user_agent = $request->userAgent();

        // If user is logged in, associate the comment with the user
        if (Auth::check()) {
            $comment->user_id = Auth::id();
            // Auto-approve comments from logged-in users if they are admin
            if (Auth::user()->is_admin) {
                $comment->is_approved = true;
            }
        }

        // Auto-approve comments if enabled in settings
        if (Setting::getValue('blog_auto_approve_comments', 0)) {
            $comment->is_approved = true;
        }

        $comment->save();

        if ($comment->is_approved) {
            return redirect()->back()->with('success', 'Komentar Anda telah berhasil dikirim.');
        } else {
            return redirect()->back()->with('success', 'Komentar Anda telah dikirim dan sedang menunggu persetujuan.');
        }
    }
}
