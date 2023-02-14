<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    // get all post
    public static function all()
    {
        // get all files in posts directory
        $files = File::files(resource_path('posts/'));

        // map files array to get the file content
        return array_map(fn ($post) => $post->getContents(), $files);
    }

    // find post by its slug
    public static function find(String $slug)
    {
        // get post path
        $path = resource_path("posts/{$slug}.html");
        // check if post file exist
        if (!file_exists($path)) throw new ModelNotFoundException();

        // caching the content for 1200 seconds / 20min to improve webiste performance 
        return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
    }
}
