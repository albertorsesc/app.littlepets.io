<?php

namespace App\Http\Controllers\Web\Blog\Articles;

use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('blog.articles.show', [
            'article' => $article
        ]);
    }
}
