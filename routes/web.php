<?php

use App\Http\Controllers\PostController;
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

    return redirect()->to('/db/posts');
    // return view('posts', [
    //     'posts' => Post::all()
    // ]);
});

Route::get('/posts/{slug}', function ($slug) {
    return redirect()->to('/db/posts');

    // return view('post', [
    //     'post' => Post::find($slug),

    // ]);
});


// with model and database
Route::get('/db/posts', [PostController::class, 'index'])->name('home');

// route model binding
Route::get('/db/posts/{post:slug}', [PostController::class, 'show']);


// Route::get('/db/category/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts->load(['author', 'category']),
//         'categories' => Category::all(),
//         'currentCategory' => $category
//     ]);
// });

// get all post by specific author
// Route::get('/db/author/{author:username}', function (User $author) {
//     return view('posts', [
//         'posts' => $author->posts->load(['author', 'category']),
//         'categories' => Category::all(),
//     ]);
// });
