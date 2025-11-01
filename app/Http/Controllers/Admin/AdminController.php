<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Gallery;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $tourPackageCount = TourPackage::count();
        $destinationCount = Destination::count();
        $galleryCount = Gallery::count();

        return view('admin.dashboard', compact(
            'tourPackageCount',
            'destinationCount',
            'galleryCount'
        ));
    }
}
