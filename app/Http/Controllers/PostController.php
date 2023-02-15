<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostDb;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            // eager load category and author data to avoid n+1 and get the latest data sorted by published at column
            'posts' => PostDb::with(['category', 'author'])->latest('published_at')->filter(request(['search']))->get(),
            'categories' => Category::all(),

        ]);
    }

    public function show(PostDb $post)
    {
        return view('post', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }
}
