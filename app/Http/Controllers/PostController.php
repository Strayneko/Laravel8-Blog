<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostDb;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostDb::with(['category', 'author'])
            ->latest('published_at')
            ->filter(request(['search', 'category']))
            ->get();
        return view('posts.index', [
            // eager load category and author data to avoid n+1 and get the latest data sorted by published at column
            'posts' => $posts,


        ]);
    }

    public function show(PostDb $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
