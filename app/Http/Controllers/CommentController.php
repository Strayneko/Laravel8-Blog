<?php

namespace App\Http\Controllers;

use App\Models\PostDb;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(PostDb $post, Request $request)
    {

        // validation
        $request->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }
}
