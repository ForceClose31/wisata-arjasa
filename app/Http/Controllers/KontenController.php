<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konten;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    public function index(Request $request)
    {
        // filter
        $query = Konten::where('status', 'approved');

        $topContents = Konten::where('status', 'approved')
            ->orderBy('views_count', 'desc')
            ->take(1)
            ->get();

        // Apply filters
        if ($request->has('kategori') && $request->kategori != 'semua') {
            $query->where('kategori', $request->kategori);
        }

        if ($request->has('asal') && $request->asal != 'semua') {
            $query->where('asal', $request->asal);
        }

        // Apply search
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%'.$request->search.'%')
                  ->orWhere('isi', 'like', '%'.$request->search.'%');
            });
        }

        $contents = $query->orderBy('created_at', 'desc')->paginate(6);

        $asalList = Konten::where('status', 'approved')
            ->distinct()
            ->orderBy('asal')
            ->pluck('asal');

        return view('user.konten', compact('contents', 'asalList', 'topContents'));
    }


    public function histori()
    {
        $contents = Konten::where('akun_id', Auth::id())
                            ->latest()
                            ->paginate(10);

        return view('user.konten.histori', compact('contents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|in:tarian,musik,kuliner,upacara,kerajinan',
            'asal' => 'required',
            'isi' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('konten-thumbnails', 'public');
        }

        Konten::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'asal' => $request->asal,
            'thumbnail' => $thumbnailPath,
            'akun_id' => Auth::id(),
            'status' => 'pending'
        ]);

        Alert::success('Sukses', 'Konten budaya berhasil diajukan!');
        return redirect()->route('konten.histori');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|in:tarian,musik,kuliner,upacara,kerajinan',
            'asal' => 'required',
            'isi' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('konten-thumbnails', 'public');
        }

        Konten::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'asal' => $request->asal,
            'thumbnail' => $thumbnailPath,
            'akun_id' => Auth::id(),
            'status' => 'pending'
        ]);

        Alert::success('Sukses', 'Konten budaya berhasil diajukan!');
        return redirect()->route('admin.konten.index');
    }

    public function show($id)
    {
        $content = Konten::with('akun')->findOrFail($id);

        $content->increment('views_count');

        $relatedContents = Konten::where('status', 'approved')
                              ->where('id', '!=', $content->id)
                              ->where(function($query) use ($content) {
                                  $query->where('kategori', $content->kategori)
                                        ->orWhere('asal', $content->asal);
                              })
                              ->orderBy('views_count', 'desc')
                              ->take(3)
                              ->get();

        return view('user.konten.show', compact('content', 'relatedContents'));
    }

    public function edit($id)
    {
        $konten = Konten::findOrFail($id);

        return view('user.konten.edit', compact('konten'));
    }


}
