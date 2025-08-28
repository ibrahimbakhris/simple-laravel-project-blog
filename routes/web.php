<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    \App\Http\Controllers\HomeController::class,
    'index'
])->name('welcome');

Route::get('/tentang-blog', [
    \App\Http\Controllers\AboutController::class,
    'index'
])->name('about');

Route::get('posts', [
    \App\Http\Controllers\PostController::class,
    'index'
])->name('posts.index');

Route::get('posts/create', [
    \App\Http\Controllers\PostController::class,
    'create'
])->name('posts.create');

Route::post('posts/store', [
    \App\Http\Controllers\PostController::class,
    'store'
])->name('posts.store');

Route::get('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'show'
])->name('posts.show');

Route::get('posts/{slug}/edit', [
    \App\Http\Controllers\PostController::class,
    'edit'
])->name('posts.edit');

Route::put('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'update'
])->name('posts.update');

Route::delete('posts/{slug}', [
    \App\Http\Controllers\PostController::class,
    'destroy'
])->name('posts.destroy');

// Comment routes
Route::post('posts/{slug}/comments', [
    \App\Http\Controllers\CommentController::class,
    'store'
])->name('comments.store');

Route::delete('comments/{id}', [
    \App\Http\Controllers\CommentController::class,
    'destroy'
])->name('comments.destroy');


Route::middleware('auth')->group(function() {
    Route::get('admin/dashboard', [
        \App\Http\Controllers\DashboardController::class,
        'index'
    ])->name('admin.dashboard.index');
});

Route::get('test', function() {
    // Ambil semua data
    // $posts = \App\Models\Post::all();
    // dd($posts);

    // Ambil data ikut syarat
    // $posts = \App\Models\Post::where('category', 'Pengaturcaraan')->get();
    // dd($posts);

    // Susun Data (Order)
    // $posts = \App\Models\Post::orderBy('created_at', 'desc')->get();
    // dd($posts);

    // Limitkan Data
    // $posts = \App\Models\Post::limit(10)->get();
    // dd($posts);

    // Pilih Column Tertentu
    // $posts = \App\Models\Post::select('title', 'created_at')->get();

    // dd($posts);
});


Route::get('login', [
    \App\Http\Controllers\AuthController::class,
    'showLogin'
])->name('login');

Route::post('login', [
    \App\Http\Controllers\AuthController::class,
    'login'
])->name('login');

Route::get('register', [
    \App\Http\Controllers\AuthController::class,
    'showRegister'
])->name('register');

Route::post('register', [
    \App\Http\Controllers\AuthController::class,
    'register'
])->name('register.post');

Route::post('logout', [
    \App\Http\Controllers\AuthController::class,
    'logout'
])->name('logout');
