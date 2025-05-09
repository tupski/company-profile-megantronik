<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index(Request $request)
    {
        $posts = BlogPost::with(['category', 'tags', 'user'])
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::withCount('posts')->get();
        $tags = BlogTag::withCount('posts')->get();
        $featured = BlogPost::with('category')
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('frontend.blog.index', compact('posts', 'categories', 'tags', 'featured'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(BlogPost $post)
    {
        if (!$post->is_published) {
            abort(404);
        }

        $post->load(['category', 'tags', 'user']);
        $post->incrementViewCount();

        // Load comments with their replies
        $post->load(['comments' => function($query) {
            $query->approved()->parentOnly()->with(['replies' => function($q) {
                $q->approved();
            }]);
        }]);

        $related = BlogPost::with('category')
            ->published()
            ->where('id', '!=', $post->id)
            ->where('blog_category_id', $post->blog_category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = BlogCategory::withCount('posts')->get();
        $tags = BlogTag::withCount('posts')->get();

        return view('frontend.blog.show', compact('post', 'related', 'categories', 'tags'));
    }

    /**
     * Display posts by category.
     */
    public function category(BlogCategory $category)
    {
        $posts = BlogPost::with(['category', 'tags', 'user'])
            ->published()
            ->where('blog_category_id', $category->id)
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::withCount('posts')->get();
        $tags = BlogTag::withCount('posts')->get();

        return view('frontend.blog.category', compact('posts', 'category', 'categories', 'tags'));
    }

    /**
     * Display posts by tag.
     */
    public function tag(BlogTag $tag)
    {
        $posts = $tag->posts()
            ->with(['category', 'tags', 'user'])
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::withCount('posts')->get();
        $tags = BlogTag::withCount('posts')->get();

        return view('frontend.blog.tag', compact('posts', 'tag', 'categories', 'tags'));
    }
}
