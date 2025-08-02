<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminDestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('category')->latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        $categories = DestinationCategory::all();
        return view('admin.destinations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'category_id' => 'required|exists:destination_categories,id',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'location_id' => 'required|string',
            'location_en' => 'required|string',
            'operational_hours_id' => 'required|string',
            'operational_hours_en' => 'required|string',
            'type_id' => 'required|string',
            'type_en' => 'required|string',
            'facilities_id' => 'required|array',
            'facilities_en' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $validated['image'] = $imagePath;
        }

        // Prepare multilingual fields
        $validated['title'] = [
            'id' => $validated['title_id'],
            'en' => $validated['title_en'],
        ];

        $validated['description'] = [
            'id' => $validated['description_id'],
            'en' => $validated['description_en'],
        ];

        $validated['location'] = [
            'id' => $validated['location_id'],
            'en' => $validated['location_en'],
        ];

        $validated['operational_hours'] = [
            'id' => $validated['operational_hours_id'],
            'en' => $validated['operational_hours_en'],
        ];

        $validated['type'] = [
            'id' => $validated['type_id'],
            'en' => $validated['type_en'],
        ];

        $validated['facilities'] = [
            'id' => $validated['facilities_id'],
            'en' => $validated['facilities_en'],
        ];

        $validated['admin_id'] = auth()->id();

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi wisata berhasil ditambahkan');
    }

    public function edit(Destination $destination)
    {
        $categories = DestinationCategory::all();
        return view('admin.destinations.edit', compact('destination', 'categories'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'category_id' => 'required|exists:destination_categories,id',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'location_id' => 'required|string',
            'location_en' => 'required|string',
            'operational_hours_id' => 'required|string',
            'operational_hours_en' => 'required|string',
            'type_id' => 'required|string',
            'type_en' => 'required|string',
            'facilities_id' => 'required|array',
            'facilities_en' => 'required|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }

            $imagePath = $request->file('image')->store('destinations', 'public');
            $validated['image'] = $imagePath;
        }

        // Prepare multilingual fields
        $validated['title'] = [
            'id' => $validated['title_id'],
            'en' => $validated['title_en'],
        ];

        $validated['description'] = [
            'id' => $validated['description_id'],
            'en' => $validated['description_en'],
        ];

        $validated['location'] = [
            'id' => $validated['location_id'],
            'en' => $validated['location_en'],
        ];

        $validated['operational_hours'] = [
            'id' => $validated['operational_hours_id'],
            'en' => $validated['operational_hours_en'],
        ];

        $validated['type'] = [
            'id' => $validated['type_id'],
            'en' => $validated['type_en'],
        ];

        $validated['facilities'] = [
            'id' => $validated['facilities_id'],
            'en' => $validated['facilities_en'],
        ];

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi wisata berhasil diperbarui');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi wisata berhasil dihapus');
    }
}
