<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;

// Route::get('/teste', function () {
//     $user = User::first();

//     dd($user->image());
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [PostsController::class, 'show'])->name('posts.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/tags/{tag:nome}', [TagController::class, 'show'])->name('tags.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
