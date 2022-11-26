<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\AdminControllers\TinyMCEController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\AdminCategoriesController;

// Route::get('/teste', function () {
//     $user = User::first();

//     dd($user->image());
// });

// Front User Routes 
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [PostsController::class, 'show'])->name('posts.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/tags/{tag:nome}', [TagController::class, 'show'])->name('tags.show');


//Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'isadmin'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');
    Route::resource('/posts', AdminPostsController::class);
    Route::resource('/categories', AdminCategoriesController::class);
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
