<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');

Route::post('/register', [AuthController::class, 'registerStore'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/login', [AuthController::class, 'loginStore']);

Route::post('/logout', [AuthController::class, 'logout']);

// RestFul API Naming Convention

// all -> index
// one data -> show
// create page -> create
// store -> store
// edit -> edit
// update -> update
// destroy -> destroy
