<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
            
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (!$post->published_at && !auth()->check()) {
            abort(404);
        }
        
        return view('blog.show', compact('post'));
    }
}
