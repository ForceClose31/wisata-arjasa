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

}
