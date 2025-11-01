<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

    public function show($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        $destination->increment('views_count');

        $nearbyDestinations = Destination::where('id', '!=', $destination->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('user.destinasi-wisata.destinasi-wisata-detail', compact('destination', 'nearbyDestinations'));
    }

    public function create()
    {
        $categories = DestinationCategory::all();
        return view('user.destinasi-wisata.create', compact('categories'));
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        $categories = DestinationCategory::all();
        return view('user.destinasi-wisata.edit', compact('destination', 'categories'));
    }

    public function history()
    {
        $destinations = Destination::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
        return view('user.destinasi-wisata.history', compact('destinations'));
    }

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

    public function editAdmin(Destination $destination)
    {
        $categories = DestinationCategory::all();
        return view('admin.destinations.edit', compact('destination', 'categories'));
    }

}
