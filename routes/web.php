<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//homepage
Route::get('/', [HomeController::class, 'home'])->name('home');

//dashboard
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');


//admin
//login
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login_post'])->name('admin.login_post');

//register
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin', [AdminController::class, 'register_post'])->name('admin.register_post');

//logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//posts
// Route::get('/posts', [PostController::class, 'index'])->name('post.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
// Route::post('/posts', [PostController::class, 'store'])->name('post.store');
// Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
// Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
// Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::resource('posts', PostController::class);