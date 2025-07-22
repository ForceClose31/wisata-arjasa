<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cottage;
use App\Models\TourPackage;
use App\Models\PackageType;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function tourPackage()
    {
        $packageTypes = PackageType::where('is_active', true)->get();

        $featuredPackages = TourPackage::with(['packageType', 'pricings' => fn($q) => $q->orderBy('price', 'asc')])
            ->where('is_available', true)
            ->where('is_featured', true)
            ->latest()
            ->paginate(6);

        return view('user.tour-package.tour-package', compact('packageTypes', 'featuredPackages'));
    }

    public function byType($packageType)
    {
        $packageTypes = PackageType::where('is_active', true)->get();

        if ($packageType === 'all') {
            $tourPackages = TourPackage::with(['pricings' => fn($q) => $q->orderBy('price', 'asc')])
                ->where('is_available', true)
                ->latest()
                ->paginate(9);

            return view('user.tour-package.tour-package', [
                'tourPackages' => $tourPackages,
                'packageTypes' => $packageTypes,
                'title' => __('All Tour Packages')
            ]);
        }

        $type = PackageType::where('slug', $packageType)->firstOrFail();

        $tourPackages = TourPackage::with(['pricings' => fn($q) => $q->orderBy('price', 'asc')])
            ->where('package_type_id', $type->id)
            ->where('is_available', true)
            ->latest()
            ->paginate(6);

        return view('user.packages.by-type', [
            'packageType' => $type,
            'tourPackages' => $tourPackages,
            'packageTypes' => $packageTypes
        ]);
    }

    public function show(TourPackage $tourPackage)
    {
        if (!$tourPackage->is_available) {
            abort(404);
        }

        $tourPackage->load([
            'packageType',
            'pricings' => fn($q) => $q->orderBy('price', 'asc')
        ]);

        $relatedPackages = TourPackage::with(['packageType', 'pricings' => fn($q) => $q->orderBy('price', 'asc')])
            ->where('package_type_id', $tourPackage->package_type_id)
            ->where('id', '!=', $tourPackage->id)
            ->where('is_available', true)
            ->latest()
            ->take(3)
            ->get();

        $pricingVariants = $tourPackage->pricings()
            ->select('variant')
            ->whereNotNull('variant')
            ->distinct()
            ->pluck('variant');

        return view('user.packages.show', compact(
            'tourPackage',
            'relatedPackages',
            'pricingVariants'
        ));
    }
}

// $articleQuery = Article::query()->where('is_published', true);

// if (request()->filled('search')) {
//     $searchTerm = request('search');
//     $articleQuery->where(function ($query) use ($searchTerm) {
//         $query->where('title', 'like', "%$searchTerm%")
//             ->orWhere('content', 'like', "%$searchTerm%");
//     });
// }

// if (request()->filled('category')) {
//     $articleQuery->where('category', request('category'));
// }

// $articles = $articleQuery->latest()->paginate(9);
// $categories = Article::select('category')->distinct()->pluck('category');

// $popularTags = Tag::withCount('articles')
//     ->orderByDesc('articles_count')
//     ->limit(10)
//     ->get();

// $packageTypes = PackageType::with([
//     'tourPackages' => function ($query) {
//         $query->where('is_available', true)
//             ->with(['pricings' => fn($q) => $q->orderBy('price', 'asc')])
//             ->orderBy('created_at', 'desc');
//     }
// ])->where('is_active', true)->get();

// $featuredPackages = TourPackage::with(['packageType', 'pricings' => fn($q) => $q->orderBy('price', 'asc')])
//     ->where('is_available', true)
//     ->where('is_featured', true)
//     ->latest()
//     ->take(4)
//     ->get();

// $newestPackages = TourPackage::with(['packageType', 'pricings' => fn($q) => $q->orderBy('price', 'asc')])
//     ->where('is_available', true)
//     ->latest()
//     ->take(4)
//     ->get();

// $specialPackages = TourPackage::with(['packageType', 'pricings'])
//     ->whereHas('packageType', fn($query) => $query->where('slug', 'hyang-argopuro-festival'))
//     ->where('is_available', true)
//     ->latest()
//     ->take(2)
//     ->get();

// $cottages = Cottage::where('is_available', true)->get();
