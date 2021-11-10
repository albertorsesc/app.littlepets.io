<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCategoryRequest;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function __construct ()
    {
        $this->authorizeResource(BlogCategory::class, 'category');
    }

    public function index()
    {
        return view('blog.categories.index', [
            'categories' => BlogCategory::query()->orderBy('display_name')->get()
        ]);
    }

    public function create()
    {
        return view('blog.categories.create');
    }

    public function store(BlogCategoryRequest $request)
    {
        BlogCategory::create($request->all());

        return redirect()->route('web.blog.admin.categories.index');
    }
}
