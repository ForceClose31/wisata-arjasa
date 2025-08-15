<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = GalleryCategory::all();
        $selectedCategory = $request->input('category');
        
        $galleries = Gallery::when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('galleryCategory', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            }); 
        })
        ->with('galleryCategory')
        ->get();

        if ($request->ajax()) {
            return response()->json([
                'galleries' => $galleries,
                'html' => view('user.gallery.partials.gallery-grid', compact('galleries'))->render()
            ]);
        }

        return view('user.gallery.gallery', compact('galleries', 'categories', 'selectedCategory'));
    }
}