<?php

namespace App\Http\Controllers\Web\Blog\Articles\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('blog.articles.admin.index', [
            'articles' => Article::query()->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('blog.articles.admin.create');
    }

    public function store(Request $request)
    {
        Article::create($request->all());

        return redirect()->route('web.blog.admin.articles.index');
    }

    public function edit(Article $article)
    {
        return view('blog.articles.admin.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return redirect()->route('web.blog.articles.show', $article);
    }
}
