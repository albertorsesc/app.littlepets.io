<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('blog.categories.index', [
            'categories' => BlogCategory::query()->orderBy('title')->get()
        ]);
    }

    public function create()
    {
        return view('blog.categories.create');
    }

    public function store(Request $request)
    {
        BlogCategory::create($request->all());

        return redirect()->route('web.blog.categories.index');
    }
}
