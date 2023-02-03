<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs', [
            'blogs' =>  Blog::latest()->filter(request(['search', 'category', 'author']))->get(),
            'categories' => Category::all(),
            'currentCategory' => Category::where('slug', request('category'))->first()
        ]);
    }
}
