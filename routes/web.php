<?php

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

Route::get('/', function () {
    return view('posts');
});

Route::get('/posts/{slug}', function (String $slug) {
    // get post path
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    // check if post file exist
    if (!file_exists($path)) return redirect()->to('/');

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post,
    ]);
})->where('slug', '[A-z_\-]+'); // add constrain to wildcard
