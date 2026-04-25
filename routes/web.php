<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Models\MenuCategory;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\TeamMember;

// ==========================================
// 1. FRONTEND ROUTES (Untuk Pengunjung Web)
// ==========================================
Route::get('/', function () {
    $setting = \App\Models\Setting::first();
    $homeSections = \App\Models\HomeSection::orderBy('sort_order')->get();
    return view('home', compact('setting', 'homeSections'));
})->name('home');

Route::get('/about', function () {
    $teams = \App\Models\TeamMember::all();
    $setting = \App\Models\Setting::first();
    $aboutSections = \App\Models\AboutSection::orderBy('sort_order')->get();
    return view('about', compact('teams', 'setting', 'aboutSections'));
})->name('about');

Route::get('/menu', function () {
    $categories = MenuCategory::with('items')->orderBy('sort_order')->orderBy('name', 'asc')->get();
    return view('menu', compact('categories'));
})->name('menu');

Route::get('/gallery', function () {
    $galleries = Gallery::latest()->get();
    return view('gallery', compact('galleries'));
})->name('gallery');

Route::get('/visit', function () {
    $setting = Setting::first();
    return view('visit', compact('setting'));
})->name('visit');


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

    // Manajemen Halaman Publik
    Route::get('pages/home',   [PageController::class, 'home'])->name('pages.home');
    Route::put('pages/home',   [PageController::class, 'homeUpdate'])->name('pages.home.update');
    Route::get('pages/about',  [PageController::class, 'about'])->name('pages.about');
    Route::put('pages/about',  [PageController::class, 'aboutUpdate'])->name('pages.about.update');
    Route::get('pages/visit',  [PageController::class, 'visit'])->name('pages.visit');
    Route::put('pages/visit',  [PageController::class, 'visitUpdate'])->name('pages.visit.update');

    Route::resource('pages/home-sections', \App\Http\Controllers\Admin\HomeSectionController::class)->except(['index', 'show'])->names([
        'create' => 'admin.pages.home-sections.create',
        'store'  => 'admin.pages.home-sections.store',
        'edit'   => 'admin.pages.home-sections.edit',
        'update' => 'admin.pages.home-sections.update',
        'destroy'=> 'admin.pages.home-sections.destroy',
    ]);

    Route::resource('pages/about-sections', \App\Http\Controllers\Admin\AboutSectionController::class)->except(['index', 'show'])->names([
        'create' => 'admin.pages.about-sections.create',
        'store'  => 'admin.pages.about-sections.store',
        'edit'   => 'admin.pages.about-sections.edit',
        'update' => 'admin.pages.about-sections.update',
        'destroy'=> 'admin.pages.about-sections.destroy',
    ]);
});


// ==========================================
// 3. BREEZE AUTH ROUTES (Bawaan Sistem)
// ==========================================
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});