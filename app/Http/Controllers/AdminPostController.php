<?php

namespace App\Http\Controllers;

use App\Models\PostDb;
use App\Models\Category;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        // get latest post with limit 50 post
        $posts = PostDb::latest()->paginate(50);
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {

        // validate input
        $attributes = $this->validatePost();

        // check if user provide a thumbnail
        if (request()->file('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail', 'public');
        }

        // add user id from the current authenticated user
        $attributes['user_id'] = auth()->user()->id;
        PostDb::create($attributes);

        // redirect and give feedback message
        return redirect()->to('/db/posts')->with('success', 'Post has been added!');
    }


    public function edit(PostDb $post)
    {
        $categories = Category::all(); // get all available category
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostDb $post)
    {
        // validate input
        $attributes = $this->validatePost($post);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail', 'public');
        }

        $post->update($attributes);

        // redirect and give feedback message
        return redirect()->back()->with('success', 'Post has been added!');
    }


    public function destroy(PostDb $post)
    {
        // delete post data from database
        $post->delete();
        // delete thumbnail image
        Storage::disk('public')->delete($post->thumbnail);

        return redirect()->back()->with('success', 'Post deleted');
    }

    protected function validatePost(?PostDb $post = null): array
    {
        $post ??= new PostDb();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
