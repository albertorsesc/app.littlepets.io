<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'articles' => Article::all()
        ]);
    }
}
