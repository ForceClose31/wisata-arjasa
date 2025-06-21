<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use App\Models\PackageType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $packageTypes = PackageType::with(['tourPackages' => function ($query) {
            $query->where('is_available', true)
                ->with(['pricings' => function ($q) {
                    $q->orderBy('price', 'asc');
                }])
                ->orderBy('created_at', 'desc');
        }])->where('is_active', true)->get();

        $featuredPackages = TourPackage::with(['packageType', 'pricings' => function ($query) {
            $query->orderBy('price', 'asc');
        }])
            ->where('is_available', true)
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $newestPackages = TourPackage::with(['packageType', 'pricings' => function ($query) {
            $query->orderBy('price', 'asc');
        }])
            ->where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $specialPackages = TourPackage::with(['packageType', 'pricings'])
            ->whereHas('packageType', function ($query) {
                $query->where('slug', 'hyang-argopuro-festival');
            })
            ->where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        return view('user.index', [
            'packageTypes' => $packageTypes,
            'featuredPackages' => $featuredPackages,
            'newestPackages' => $newestPackages,
            'specialPackages' => $specialPackages
        ]);
    }

    public function show(TourPackage $tourPackage)
    {
        if (!$tourPackage->is_available) {
            abort(404);
        }

        $tourPackage->load([
            'packageType',
            'pricings' => function ($query) {
                $query->orderBy('price', 'asc');
            }
        ]);

        $relatedPackages = TourPackage::with(['packageType', 'pricings' => function ($query) {
            $query->orderBy('price', 'asc')->take(1);
        }])
            ->where('package_type_id', $tourPackage->package_type_id)
            ->where('id', '!=', $tourPackage->id)
            ->where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $pricingVariants = $tourPackage->pricings()
            ->select('variant')
            ->whereNotNull('variant')
            ->distinct()
            ->pluck('variant');

        return view('user.packages.show', [
            'package' => $tourPackage,
            'relatedPackages' => $relatedPackages,
            'pricingVariants' => $pricingVariants
        ]);
    }

    public function byType($packageType)
    {
        if ($packageType === 'all') {
            $packages = TourPackage::with(['pricings' => function ($query) {
                $query->orderBy('price', 'asc');
            }])
                ->where('is_available', true)
                ->orderBy('created_at', 'desc')
                ->paginate(9);

            return view('user.packages.all', [
                'packages' => $packages,
                'title' => 'Semua Paket Wisata'
            ]);
        }

        $type = PackageType::where('slug', $packageType)->firstOrFail();

        $packages = TourPackage::with(['pricings' => function ($query) {
            $query->orderBy('price', 'asc');
        }])
            ->where('package_type_id', $type->id)
            ->where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('user.packages.by-type', [
            'packageType' => $type,
            'packages' => $packages
        ]);
    }
}
