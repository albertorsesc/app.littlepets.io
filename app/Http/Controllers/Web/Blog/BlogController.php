<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::query()
                           ->isPublished()
                           ->latest();

        return view('blog.index', [
            'articles' => $articles->paginate(5),
            'articleCount' => $articles->count()
        ]);
    }
}
