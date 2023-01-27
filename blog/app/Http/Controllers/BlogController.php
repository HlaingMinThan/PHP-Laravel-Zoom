<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('blogs', [
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog', [
            'blog' => $blog
        ]);
    }
}
