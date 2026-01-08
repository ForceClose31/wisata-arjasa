<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(): View
    {
        $newsList = News::published()
            ->with('admin:id,username')
            ->withCount('approvedComments')
            ->latest()
            ->paginate(12);

        $latestNews = News::published()
            ->latest()
            ->take(5)
            ->get();

        return view('user.news.index', compact('newsList', 'latestNews'));
    }

    public function show(string $slug): View
    {
        $news = News::published()
            ->with(['admin:id,username', 'approvedComments.replies'])
            ->where('slug', $slug)
            ->firstOrFail();

        $news->incrementViewCount();

        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(4)
            ->get();

        return view('user.news.show', compact('news', 'relatedNews'));
    }

    public function storeComment(CommentRequest $request, News $news): RedirectResponse
    {
        $news->comments()->create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'pending'
        ]);

        return back()->with('success', 'Komentar Anda berhasil dikirim dan menunggu persetujuan admin');
    }
}
