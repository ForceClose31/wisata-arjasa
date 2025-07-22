<?php

namespace App\Http\Controllers;

use App\Models\DestinationCategory;
use App\Models\Destination;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TouristDestinationController extends Controller
{
    public function index()
    {
        $categories = DestinationCategory::all();
        $destinations = Destination::with('category')->orderBy('created_at', 'desc')->get();
        return view('user.destinasi-wisata.destinasi-wisata', compact('categories', 'destinations'));
    }

    public function create()
    {
        $categories = DestinationCategory::all();
        return view('user.destinasi-wisata.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'location' => 'required',
            'description' => 'required',
            'operational_hours' => 'required',
            'type' => 'required|in:public,private',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destination-images', 'public');
        }

        Destination::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'operational_hours' => $request->operational_hours,
            'image' => $imagePath,
            'type' => $request->type,
            'user_id' => Auth::id()
        ]);

        Alert::success('Success', 'Destinasi wisata berhasil diajukan!');
        return redirect()->route('destinations.history');
    }

    public function show($id)
    {
        $destination = Destination::with('user')->findOrFail($id);
        $destination->increment('views_count');
        return view('user.destinasi-wisata.show', compact('destination'));
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        $categories = DestinationCategory::all();
        return view('user.destinasi-wisata.edit', compact('destination', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'location' => 'required|string|max:255',
            'operational_hours' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|in:public,private',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($destination->image) {
                Storage::delete('public/' . $destination->image);
            }
            $validated['image'] = $request->file('image')->store('destination-images', 'public');
        }

        $destination->update($validated);

        return redirect()->route('destinations.history')->with('success', 'Destinasi wisata berhasil diperbarui.');
    }

    public function history()
    {
        $destinations = Destination::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
        return view('user.destinasi-wisata.history', compact('destinations'));
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        if ($destination->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak diizinkan menghapus destinasi ini.');
        }

        if ($destination->image) {
            Storage::delete('public/' . $destination->image);
        }

        $destination->delete();

        return redirect()->back()->with('success', 'Destinasi wisata berhasil dihapus.');
    }

    // Admin-facing methods
    public function indexAdmin()
    {
        $destinations = Destination::with(['category', 'user'])->get();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function createAdmin()
    {
        $categories = DestinationCategory::all();
        return view('admin.destinations.create', compact('categories'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'location' => 'required',
            'description' => 'required',
            'operational_hours' => 'required',
            'type' => 'required|in:public,private',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destination-images', 'public');
        }

        Destination::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'operational_hours' => $request->operational_hours,
            'image' => $imagePath,
            'type' => $request->type,
            'user_id' => $request->user_id,
            'views_count' => $request->views_count ?? 0,
        ]);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi wisata berhasil dibuat.');
    }

    public function editAdmin(Destination $destination)
    {
        $categories = DestinationCategory::all();
        return view('admin.destinations.edit', compact('destination', 'categories'));
    }

    public function updateAdmin(Request $request, Destination $destination)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:event_categories,id',
            'location' => 'required',
            'description' => 'required',
            'operational_hours' => 'required',
            'type' => 'required|in:public,private',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|exists:users,id',
            'views_count' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($destination->image) {
                Storage::delete('public/' . $destination->image);
            }
            $data['image'] = $request->file('image')->store('destination-images', 'public');
        }

        $destination->update($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi wisata berhasil diperbarui.');
    }

    public function destroyAdmin(Destination $destination)
    {
        if ($destination->image) {
            Storage::delete('public/' . $destination->image);
        }

        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi wisata berhasil dihapus.');
    }
}
