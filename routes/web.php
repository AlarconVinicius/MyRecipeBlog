<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminControllers\TinyMCEController;
use App\Http\Controllers\AdminControllers\AdminTagsController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\AdminRolesController;
use App\Http\Controllers\AdminControllers\AdminUsersController;
use App\Http\Controllers\AdminControllers\AdminSettingController;
use App\Http\Controllers\AdminControllers\AdminCategoriesController;
use App\Http\Controllers\AdminControllers\AdminDifficultiesController;

// Route::get('/teste', function () {
//     $user = User::first();

//     dd($user->image());
// });

// Front User Routes 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', AboutController::class)->name('about');

Route::get('/post/{post:slug}', [PostsController::class, 'show'])->name('posts.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/tags/{tag:nome}', [TagController::class, 'show'])->name('tags.show');


//Admin Dashboard Routes
Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'check_permissions'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');
    Route::resource('posts', AdminPostsController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('tags', AdminTagsController::class)->only(['index', 'show', 'destroy']);
    Route::resource('difficulties', AdminDifficultiesController::class);
    Route::resource('roles', AdminRolesController::class)->except('show');
    Route::resource('users', AdminUsersController::class);
    
    Route::get('about', [AdminSettingController::class, 'edit'])->name('setting.edit');
    Route::post('about', [AdminSettingController::class, 'update'])->name('setting.update');
});

require __DIR__.'/auth.php';
