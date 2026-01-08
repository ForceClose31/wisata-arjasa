<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminCommentController extends Controller
{
    public function index(): View
    {
        $comments = NewsComment::with(['news:id,title', 'parent'])
            ->latest()
            ->paginate(20);

        $stats = [
            'pending' => NewsComment::pending()->count(),
            'approved' => NewsComment::approved()->count(),
            'rejected' => NewsComment::rejected()->count(),
            'total' => NewsComment::count(),
        ];

        return view('admin.comments.index', compact('comments', 'stats'));
    }

    public function approve(NewsComment $comment): RedirectResponse
    {
        $comment->approve(auth()->id());

        return back()->with('success', 'Komentar berhasil disetujui');
    }

    public function reject(NewsComment $comment): RedirectResponse
    {
        $comment->reject();

        return back()->with('success', 'Komentar berhasil ditolak');
    }

    public function destroy(NewsComment $comment): RedirectResponse
    {
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus');
    }
}
