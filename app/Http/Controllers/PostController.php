<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostDb;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostDb::with(['category', 'author'])
            ->latest('published_at')
            ->filter(request(['search', 'category', 'author']))
            ->paginate(6);
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



    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {

        // validate input
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        // add user id from the current authenticated user
        $attributes['user_id'] = auth()->user()->id;
        PostDb::create($attributes);

        // redirect and give feedback message
        return redirect('/db/posts')->with('success', 'Post has been added!');
    }
}
