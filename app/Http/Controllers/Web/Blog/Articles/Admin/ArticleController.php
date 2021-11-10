<?php

namespace App\Http\Controllers\Web\Blog\Articles\Admin;

use App\Models\Blog\Article;
use App\Models\Blog\BlogCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\ArticleRequest;

class ArticleController extends Controller
{
    public function __construct ()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        return view('blog.articles.admin.index', [
            'articles' => Article::query()->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('blog.articles.admin.create', [
            'categories' => BlogCategory::query()->orderBy('display_name')->get()
        ]);
    }

    public function store(ArticleRequest $request)
    {

        $article = Article::create($request->except('is_published'));
        $article->publish();

        $article->categories()->sync($request->categories);

        if ($request->hasFile('image')) {
            $article->uploadImage($request->file('image'));
        }

        return redirect()->route('web.blog.admin.articles.index');
    }

    public function edit(Article $article)
    {
        return view('blog.articles.admin.edit', [
            'article' => $article,
            'categories' => BlogCategory::query()->orderBy('display_name')->get()
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->publish();

        $article->update($request->all());

        if ($request->hasFile('image') && $article->media()->count()) {
            $article->deleteMedia(
                $article->getMedia()->first()->id
            );
            $article->uploadImage($request->file('image'));
        }

        if ($request->has('categories')) {
            $article->categories()->sync($request->categories);
        }

        return redirect()->route('web.blog.admin.articles.index', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('web.blog.admin.articles.index');
    }
}
