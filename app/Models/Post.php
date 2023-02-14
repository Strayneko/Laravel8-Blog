<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title, $body, $excerpt, $date, $slug;

    public function __construct($title, $body, $excerpt, $date, $slug)
    {
        $this->title = $title;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
    }

    // get all post
    public static function all(): object
    {
        // get all files in posts directory
        $files = File::files(resource_path('posts/'));

        // wrap files into laravel collection
        $posts =  collect($files)
            ->map(fn ($file) => YamlFrontMatter::parseFile($file)) // parse file to get post metadata
            ->map(fn ($document) => new Post(
                title: $document->title,
                excerpt: $document->excerpt,
                date: $document->date,
                body: $document->body(),
                slug: $document->slug
            ))
            ->sortByDesc('date'); // sort post from the latest post

        // cache post data for 1200 secs/20mins
        return cache()->remember('post.all', 1200, fn () => $posts);
    }

    // find post by its slug
    public static function find(String $slug): object
    {
        // get one post by its slug
        return static::all()->firstWhere('slug', $slug);
    }
}
