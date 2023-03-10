<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'blogs' => Blog::paginate()
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $cleanData = request()->validate([
            "title" => ['required'],
            "slug" => ['required'],
            "intro" => ['required'],
            "body" => ['required'],
            "photo" => ["image"],
            "category_id" => ['required', Rule::exists('categories', 'id')]
        ]);

        $path = request('photo')->store('my-photo');
        $cleanData['user_id'] = auth()->id();
        $cleanData['photo'] = $path;
        Blog::create($cleanData);
        return redirect('/');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
