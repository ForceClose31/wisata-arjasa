<?php

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
    // Route::get('/tour-packages/{slug}', [HomeController::class, 'show'])->name('tour-packages.show');
    Route::get('/packages/{tourPackage}', [HomeController::class, 'show'])->name('tour-packages.show');
    Route::get('/packages/all', [HomeController::class, 'show'])->name('packages.show');
    Route::get('/packages/', [HomeController::class, 'show'])->name('tour-package.all');
    Route::get('/packages/type/{packageType}', [HomeController::class, 'byType'])->name('packages.by-type');

    // Articles
    Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.all');
    Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/artikel/tag/{slug}', [ArticleController::class, 'byTag'])->name('articles.byTag');
    Route::get('/e-booklet', function() {
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


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return ('index');
    })->name('dashboard');
    // Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //     Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('laporan.index');
//     Route::get('/konten/create', [AdminController::class, 'create'])->name('konten.create');
//     Route::post('/konten/storeAdmin', [KontenController::class, 'storeAdmin'])->name('konten.storeAdmin');
//     Route::get('/konten/read', [AdminController::class, 'index'])->name('konten.index');
//     Route::get('/konten/{id}/edit', [AdminController::class, 'edit'])->name('konten.edit');
//     Route::put('/konten/{id}', [AdminController::class, 'update'])->name('konten.update');
//     Route::delete('/konten/{id}', [AdminController::class, 'destroy'])->name('konten.destroy');

    //     // profile admin
//     Route::get('/profile', [AdminController::class, 'profile'])->name('profile'); // Admin Profile
//     Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('profile.edit'); // Edit Profile
//     Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update'); // Update Profile

    //     // Event Routes
//     Route::get('/events', [EventController::class, 'indexAdmin'])->name('events.index'); // Menampilkan daftar event
//     Route::get('/events/create', [EventController::class, 'createAdmin'])->name('events.create'); // Form tambah event
//     Route::post('/events/store', [EventController::class, 'storeAdmin'])->name('events.store');
//     Route::get('/events/{event}', [EventController::class, 'showAdmin'])->name('events.show');
//     Route::put('/events/{event}', [EventController::class, 'updateAdmin'])->name('events.update');
//     Route::delete('/events/{event}', [EventController::class, 'destroyAdmin'])->name('events.destroy');
//     Route::get('/events/{event}/edit', [EventController::class, 'editAdmin'])->name('admin.events.edit');


    //     Route::post('/content/{id}/approve', [AdminController::class, 'approveContent'])->name('content.approve');
//     Route::post('/content/{id}/reject', [AdminController::class, 'rejectContent'])->name('content.reject');
//     Route::post('/recalculate-badges', [BadgeController::class, 'recalculateAllBadges'])->name('recalculate.badges');
});
