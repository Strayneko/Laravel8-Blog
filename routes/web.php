<?php

use App\Models\Post;
use App\Models\PostDb;
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
        'posts' => PostDb::all()
    ]);
});

Route::get('/db/posts/{id}', function ($id) {
    return view('post', [
        'post' => PostDb::findOrFail($id),
    ]);
});
