<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;

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
Route::get(
    '/',
    fn ()  =>  redirect()->to('/db/posts')
);



// with model and database
Route::get('/db/posts', [PostController::class, 'index'])->name('home');

// route model binding
Route::get('/db/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/db/posts/{post:slug}/comments', [CommentController::class, 'store']);


Route::get('/auth/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/auth/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/auth/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/auth/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/auth/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::get('/db/category/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts->load(['author', 'category']),
//         'categories' => Category::all(),
//         'currentCategory' => $category
//     ]);
// });

// // get all post by specific author
// Route::get('/db/author/{author:username}', function (User $author) {
//     return view('posts', [
//         'posts' => $author->posts->load(['author', 'category']),
//         'categories' => Category::all(),
//     ]);
// });

// Route::get('/posts/{slug}', function ($slug) {
//     return redirect()->to('/db/posts');

//     // return view('post', [
//     //     'post' => Post::find($slug),

//     // ]);
// });
