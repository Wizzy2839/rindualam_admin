<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\MenuCategory;
use App\Models\Gallery;
use App\Models\TeamMember;

// ==========================================
// 1. FRONTEND ROUTES (Untuk Pengunjung Web)
// ==========================================
Route::view('/', 'home')->name('home');

Route::get('/about', function () {
    $teams = TeamMember::all();
    return view('about', compact('teams'));
})->name('about');

Route::get('/menu', function () {
    $categories = MenuCategory::with(['items' => function($query) {
        $query->where('is_available', true);
    }])->orderBy('sort_order')->get();
    return view('menu', compact('categories'));
})->name('menu');

Route::get('/gallery', function () {
    $galleries = Gallery::latest()->get();
    return view('gallery', compact('galleries'));
})->name('gallery');

Route::view('/visit', 'visit')->name('visit');


// ==========================================
// 2. ADMIN ROUTES (Dashboard & CRUD)
// ==========================================
Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
        $stats = [
            'menu' => \App\Models\MenuItem::count(),
            'kategori' => \App\Models\MenuCategory::count(),
            'gallery' => \App\Models\Gallery::count(),
            'team' => \App\Models\TeamMember::count(),
        ];
        return view('dashboard', compact('stats'));
    })->name('dashboard');

    Route::resource('menu-categories', MenuCategoryController::class);
    Route::resource('menu-items', MenuItemController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('team-members', TeamMemberController::class);
    
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});


// ==========================================
// 3. BREEZE AUTH ROUTES (Bawaan Sistem)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';