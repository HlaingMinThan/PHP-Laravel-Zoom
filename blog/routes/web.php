<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\AdminMiddleware;
use App\Mail\SubscriberMail;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

//subscription route
Route::post('/blogs/{blog:slug}/subscription', [SubscriptionController::class, 'toggleSubscription']);

Route::middleware('admin')->prefix('/admin')->group(function () {
    Route::get('', [AdminBlogController::class, 'index']);
    Route::get('/blogs/create', [AdminBlogController::class, 'create']);

    Route::post('/blogs', [AdminBlogController::class, 'store']);
    Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy']);
});

// RestFul API Naming Convention

// all -> index
// one data -> show
// create page -> create
// store -> store
// edit -> edit
// update -> update
// destroy -> destroy
