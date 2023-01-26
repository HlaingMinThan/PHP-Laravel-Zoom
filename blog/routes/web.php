<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('id', '[A-z\d\-_]+'); //wildcard constrained

Route::get('/about-us', function () {
    return view('about');
});
