<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->with(['tags', 'comments.user'])
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
