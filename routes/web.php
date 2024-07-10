<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

//homepage
Route::get('/', [HomeController::class, 'home'])->name('home');

//dashboard
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');


//login
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login_post'])->name('login.post');


//register
Route::get('/admin/register', [AdminController::class, 'register'])->name('register');
Route::post('/admin/register', [AdminController::class, 'register_post'])->name('register.post');

