<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminNewsController extends Controller
{
    public function __construct(
        private ImageService $imageService
    ) {
    }

    public function index(): View
    {
        $news = News::with('admin:id,username')
            ->withCount('comments')
            ->latest('created_at')
            ->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $data = $this->prepareData($request);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->imageService->store(
                $request->file('featured_image'),
                'news'
            );
        }

        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->imageService->store(
                $request->file('og_image'),
                'news/og'
            );
        }

        $data['admin_id'] = auth()->id();

        News::create($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $data = $this->prepareData($request);

        if ($request->hasFile('featured_image')) {
            $this->imageService->delete($news->featured_image);
            $data['featured_image'] = $this->imageService->store(
                $request->file('featured_image'),
                'news'
            );
        }

        if ($request->hasFile('og_image')) {
            $this->imageService->delete($news->og_image);
            $data['og_image'] = $this->imageService->store(
                $request->file('og_image'),
                'news/og'
            );
        }

        $news->update($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->imageService->delete($news->featured_image);
        $this->imageService->delete($news->og_image);
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    private function prepareData(NewsRequest $request): array
    {
        return [
            'title' => [
                'id' => $request->title_id,
                'en' => $request->title_en,
            ],
            'excerpt' => [
                'id' => $request->excerpt_id,
                'en' => $request->excerpt_en,
            ],
            'content' => [
                'id' => $request->content_id,
                'en' => $request->content_en,
            ],
            'meta_title' => [
                'id' => $request->meta_title_id,
                'en' => $request->meta_title_en,
            ],
            'meta_description' => [
                'id' => $request->meta_description_id,
                'en' => $request->meta_description_en,
            ],
            'meta_keywords' => [
                'id' => $request->meta_keywords_id,
                'en' => $request->meta_keywords_en,
            ],
            'is_published' => $request->boolean('is_published'),
        ];
    }
}
