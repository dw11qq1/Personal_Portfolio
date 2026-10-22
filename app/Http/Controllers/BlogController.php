<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();
        $name = optional(Profile::first())->name ?? 'Blog';

        return view('blog.index', ['posts' => $posts, 'name' => $name]);
    }

    public function show(Post $post)
    {
        abort_unless($post->published_at && $post->published_at->lte(now()), 404);

        $name = optional(Profile::first())->name ?? 'Blog';

        return view('blog.show', ['post' => $post, 'name' => $name]);
    }
}
