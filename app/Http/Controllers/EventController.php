<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;
use App\Models\Konten;
use App\Models\Event;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $categories = EventCategory::all();
        $events = Event::with('category')->orderBy('start_date', 'desc')->get();
        return view('user.event-budaya.event-budaya', compact('categories', 'events'));
    }

    public function create()
    {
        return view('user.event.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|in:tarian,musik,kuliner,upacara,kerajinan',
            'tempat' => 'required',
            'isi' => 'required',
            'jadwal' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('event-thumbnails', 'public');
        }

        Event::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'tempat' => $request->tempat,
            'jadwal' => $request->jadwal,
            'thumbnail' => $thumbnailPath,
            'akun_id' => Auth::id(),
            'status' => 'pending'
        ]);

        Alert::success('Sukses', 'Konten budaya berhasil diajukan!');
        return redirect()->route('event.histori');
    }

    public function show($id)
    {
        $event = Event::with('akun')->findOrFail($id);

        // Tambah 1 ke views_count
        $event->increment('views_count');


        return view('user.event.show', compact('event'));
    }
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('user.event.edit', compact('event'));
    }
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);


        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'jadwal' => 'required|date',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus yang lama jika ada
            if ($event->thumbnail) {
                Storage::delete('public/' . $event->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('event_thumbnails', 'public');
        }

        $event->update($validated);

        return redirect()->route('event.histori')->with('success', 'Event berhasil diperbarui.');
    }
    public function histori()
    {
        $events = Event::where('akun_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('user.event.histori', compact('events'));
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->akun_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Tidak diizinkan menghapus $event ini.');
        }

        if ($event->status !== 'pending') {
            return redirect()->back()->with('error', '$event hanya bisa dihapus saat masih pending.');
        }

        if ($event->thumbnail) {
            Storage::delete('public/' . $event->thumbnail);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus.');
    }



    public function indexAdmin()
    {
        $events = Event::all();
        $total = Konten::count();
        $totalEvents = Event::count();
        return view('admin.event.index', compact('events', 'total', 'totalEvents'));
    }

    public function createAdmin()
    {
        return view('admin.event.create');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|in:tarian,musik,kuliner,upacara,kerajinan',
            'tempat' => 'required',
            'isi' => 'required',
            'jadwal' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:rejected,pending,approved',
            'views_count' => 'nullable|integer|min:0',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('event-thumbnails', 'public');
        }

        Event::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'tempat' => $request->tempat,
            'jadwal' => $request->jadwal,
            'thumbnail' => $thumbnailPath,
            'akun_id' => $request->akun_id ?? Auth::id(),
            'status' => $request->status,
            'views_count' => $request->views_count ?? 0,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat.');
    }

    public function editAdmin(Event $event)
    {
        // Format the jadwal datetime to be compatible with datetime-local input
        $formattedEvent = [
            'id' => $event->id,
            'judul' => $event->judul,
            'isi' => $event->isi,
            'kategori' => $event->kategori,
            'tempat' => $event->tempat,
            'jadwal' => $event->jadwal ? \Carbon\Carbon::parse($event->jadwal)->format('Y-m-d\TH:i') : null,
            'thumbnail' => $event->thumbnail,
            'status' => $event->status,
            'views_count' => $event->views_count,
            'akun_id' => $event->akun_id
        ];

        return response()->json($formattedEvent);
    }

    public function updateAdmin(Request $request, Event $event)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|in:tarian,musik,kuliner,upacara,kerajinan',
            'tempat' => 'required',
            'isi' => 'required',
            'jadwal' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:rejected,pending,approved',
            'views_count' => 'nullable|integer|min:0',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'tempat' => $request->tempat,
            'jadwal' => $request->jadwal,
            'status' => $request->status,
            'views_count' => $request->views_count ?? $event->views_count,
            'akun_id' => $request->akun_id ?? $event->akun_id,
        ];

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if it exists
            if ($event->thumbnail && Storage::exists('public/' . $event->thumbnail)) {
                Storage::delete('public/' . $event->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('event-thumbnails', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroyAdmin(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }

}
