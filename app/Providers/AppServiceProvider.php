<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Cek dulu tabelnya ada gak (biar pas di-migrate di komputer lain gak error)
        if (Schema::hasTable('settings')) {
            $setting = Setting::firstOrCreate(['id' => 1]);
            // Nge-share variabel $setting ke SEMUA file Blade!
            View::share('setting', $setting);
        }
    }
}