<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use App\Models\PackageType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function tourPackage()
    {
        $featuredPackages = TourPackage::with(['packageType', 'pricings' => function($q) {
                $q->orderBy('price', 'asc');
            }])
            ->where('is_available', true)
            ->where('is_featured', true)
            ->latest()
            ->paginate(6);

        return view('user.tour-package.tour-package', compact('featuredPackages'));
    }

    public function byType($packageType)
    {
        if ($packageType === 'all') {
            $tourPackages = TourPackage::with(['packageType', 'pricings' => function($q) {
                    $q->orderBy('price', 'asc');
                }])
                ->where('is_available', true)
                ->latest()
                ->paginate(9);

            return view('user.tour-package.tour-package', [
                'featuredPackages' => $tourPackages,
                'title' => __('All Tour Packages')
            ]);
        }

        $type = PackageType::where('slug', $packageType)->firstOrFail();

        $tourPackages = TourPackage::with(['packageType', 'pricings' => function($q) {
                $q->orderBy('price', 'asc');
            }])
            ->where('package_type_id', $type->id)
            ->where('is_available', true)
            ->latest()
            ->paginate(6);

        return view('user.tour-package.tour-package', [
            'featuredPackages' => $tourPackages,
            'title' => $type->name
        ]);
    }

    public function show(TourPackage $tourPackage)
    {
        if (!$tourPackage->is_available) {
            abort(404);
        }

        return response()->download(storage_path('app/public/' . $tourPackage->pdf_path));
    }
}
