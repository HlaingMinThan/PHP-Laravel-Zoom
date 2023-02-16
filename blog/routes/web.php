<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');

Route::post('/register', [AuthController::class, 'registerStore'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/login', [AuthController::class, 'loginStore']);

Route::post('/logout', [AuthController::class, 'logout']);

//comments
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');
// RestFul API Naming Convention

// all -> index
// one data -> show
// create page -> create
// store -> store
// edit -> edit
// update -> update
// destroy -> destroy
