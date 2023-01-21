<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = Blog::all();
    return view('blogs', [
        'blogs' => $blogs
    ]);
});

//wildcard
Route::get('/blogs/{filename}', function ($filename) {
    $blog = Blog::find($filename);
    return view('blog', [
        'blog' => $blog
    ]);
})->where('filename', '[A-z\d\-_]+');//wildcard constrained
