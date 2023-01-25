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
Route::get('/blogs/{slug}', function ($slug) {
    $blog = Blog::findOrFail($slug);

    return view('blog', [
        'blog' => $blog
    ]);
})->where('slug', '[A-z\d\-_]+');//wildcard constrained
