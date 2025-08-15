<?php

use App\Http\Controllers\AdminDestinationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminTourPackageController;
use App\Http\Controllers\TouristDestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CottageController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\ContactController;

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

Route::middleware('locale')->group(function () {

    Route::get('/paket', function () {
        return view('user.about.about');
    })->name('paket.index');

    Route::get('/about', function () {
        return view('user.about.about');
    })->name('about.index');

    Route::get('/tour-package', function () {
        return view('user.tour-package.tour-package');
    })->name('tour-package.index');

    Route::get('/contact', function () {
        return view('user.contact.contact');
    })->name('contact.index');

    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

    Route::get('/cottage', [CottageController::class, 'index'])->name('cottage.index');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/tourist-destination', [TouristDestinationController::class, 'index'])->name('tourist-destination.index');
    Route::get('/tourist-destination/{slug}', [TouristDestinationController::class, 'show'])
        ->name('tourist-destination.show');

    Route::get('/transport', function () {
        return view('user.transport.transport');
    })->name('transport.index');

    Route::get('/transport', [TransportController::class, 'index'])->name('transport.index');

    Route::get('/article', function () {
        return view('user.article.article');
    })->name('article.index');


    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/tour-package', [HomeController::class, 'tourPackage'])->name('tour-package.index');
    Route::get('/packages/{tourPackage}', [HomeController::class, 'show'])->name('tour-packages.show');
    Route::get('/packages/all', [HomeController::class, 'show'])->name('packages.show');
    Route::get('/packages/', [HomeController::class, 'show'])->name('tour-package.all');
    Route::get('/packages/type/{packageType}', [HomeController::class, 'byType'])->name('packages.by-type');

    Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.all');
    Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/artikel/tag/{slug}', [ArticleController::class, 'byTag'])->name('articles.byTag');
    Route::get('/e-booklet', function () {
        return view('user.destinasi-wisata.e-booklet');
    })->name('tourist-destination.ebooklet');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/user/regis', function () {
        return view('user.regis');
    })->name('regis');

    Route::post('/register', [RegisterController::class, 'submit'])->name('register.submit');
    Route::get('/admin/login', [AuthController::class, 'ShowLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('destinations', AdminDestinationController::class)
        ->except(['show'])
        ->names('admin.destinations');
    Route::resource('tour-packages', AdminTourPackageController::class)
        ->except(['show'])
        ->names('admin.tour-packages');
    Route::resource('galleries', AdminGalleryController::class)
        ->except(['show'])
        ->names('admin.galleries');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

