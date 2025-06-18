<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tourPackages = TourPackage::where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        return view('user.index', compact('tourPackages'));
    }
}
