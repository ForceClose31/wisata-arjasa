<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $query = Article::query()->where('is_published', true);

        if (request()->has('search')) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%');
        }

        if (request()->has('category')) {
            $query->where('category', request('category'));
        }

        $articles = $query->latest()->paginate(9); // Hapus withCount('comments')

        $categories = Article::select('category')->distinct()->pluck('category');

        $popularTags = Tag::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->limit(10)
            ->get();

        return view('user.article.articleAll', compact('articles', 'categories', 'popularTags'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->with('tags')
            ->firstOrFail();

        $article->incrementReadCount();

        $relatedArticles = Article::whereHas('tags', function ($query) use ($article) {
            $query->whereIn('tags.id', $article->tags->pluck('id'));
        })
            ->where('articles.id', '!=', $article->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('user.article.article', compact('article', 'relatedArticles'));
    }

    public function byTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $articles = $tag->articles()->latest()->paginate(6);

        return view('articles.byTag', compact('tag', 'articles'));
    }
}
