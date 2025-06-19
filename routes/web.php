<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PetaBudayaController;

// Route::get('/', [AuthController::class, 'home'])->name('welcome');

// Route::get('/user', [AuthController::class, 'home']);

// Route::get('/badge', [BadgeController::class, 'index'])->name('badge.index');
// Route::get('badge/quiz', [BadgeController::class, 'quiz'])->name('badge.quiz');
// Route::post('/submit-quiz', [BadgeController::class, 'submitQuiz'])->name('badge.submit-quiz');

// Route::get('/user/konten', [KontenController::class, 'index'])->name('konten.index');
// Route::get('/about', [KontenController::class, 'index'])->name('about.index');
Route::get('/contact', function () {
    return view('user.about.about');
})->name('contact');

Route::get('/paket', function () {
    return view('user.about.about');
})->name('paket.index');

Route::get('/about', function () {
    return view('user.about.about');
})->name('about.index');

Route::get('/tour-package', function () {
    return view('user.tour-package.tour-package');
})->name('tour-package.index');

Route::get('/cottage', function () {
    return view('user.cottage.cottage');
})->name('cottage.index');

Route::get('/gallery', function () {
    return view('user.gallery.gallery');
})->name('gallery.index');

Route::get('/event-budaya', function () {
    return view('user.event-budaya.event-budaya');
})->name('event-budaya.index');

Route::get('/transport', function () {
    return view('user.transport.transport');
})->name('transport.index');

Route::get('/article', function () {
    return view('user.article.article');
})->name('article.index');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tour-packages', [HomeController::class, 'index'])->name('tour-packages.index');
Route::get('/tour-packages/{slug}', [HomeController::class, 'show'])->name('tour-packages.show');

// Route::get('/tour-package', function () {
//     return view('user.event');
// })->name('tour-package');

// Route::get('/konten-detail/{id}', [KontenController::class, 'show'])->name('kontenbudaya.show');

// Route::get('/user/event', [EventController::class, 'index'])->name('event.index');
// Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [AuthController::class, 'home'])->name('home');

// Route::get('/peta-budaya', [PetaBudayaController::class, 'index'])->name('peta-budaya');

// Route::get('/konten/{id}', [PetaBudayaController::class, 'show'])->name('konten.show');

// Articles
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/artikel/tag/{slug}', [ArticleController::class, 'byTag'])->name('articles.byTag');

// Route::middleware(['guest'])->group(function () {
//     Route::get('/user/regis', function () {
//         return view('user.regis');
//     })->name('regis');

//     Route::post('/register', [RegisterController::class, 'submit'])->name('register.submit');
//     Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login');
//     Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
// });


// Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
// });
