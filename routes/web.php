<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\PostDb;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// model only without database
Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{slug}', function ($slug) {

    return view('post', [
        'post' => Post::find($slug),
    ]);
});


// with model and database
Route::get('/db/posts', function () {
    return view('posts', [
        // eager load category and author data to avoid n+1 and get the latest data sorted by published at column
        'posts' => PostDb::with(['category', 'author'])->latest('published_at')->get(),
    ]);
});

// route model binding
Route::get('/db/posts/{post:slug}', function (PostDb $post) {
    return view('post', [
        'post' => $post,
    ]);
});


Route::get('/db/category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['author', 'category']),
    ]);
});

// get all post by specific author
Route::get('/db/author/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['author', 'category']),
    ]);
});
