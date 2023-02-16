<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' =>  Blog::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog->load('comments'),
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }
}
