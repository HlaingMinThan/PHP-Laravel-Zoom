<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs');
});

//wildcard
Route::get('/blogs/{filename}', function ($filename) {
    $path = resource_path("/blogs/$filename.html"); //absolute path -> os -> no issue

    if (!file_exists($path)) {
        return redirect('/');
    }
    //cache concept
    $blogContent = cache()->remember("posts.$filename", now()->addMinutes(2), function () use ($path) {
        return file_get_contents($path); //operation
    }); //saved in the server memory for 5 seconds

    return view('blog', [
        'blog' => $blogContent
    ]);
})->where('filename', '[A-z\d\-_]+');//wildcard constrained
