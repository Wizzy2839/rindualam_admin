<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\HomeSection;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // =====================================================
    // HALAMAN BERANDA (HOME)
    // =====================================================

    public function home()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        $sections = HomeSection::orderBy('sort_order')->get();
        return view('admin.pages.home', compact('setting', 'sections'));
    }

    public function homeUpdate(Request $request)
    {
        $setting = Setting::first();
        $data = $request->only([
            'home_hero_title',
            'home_hero_subtitle',
        ]);
        $setting->update($data);
        return redirect()->back()->with('success', 'Teks Hero Beranda berhasil diperbarui.');
    }

    // =====================================================
    // HALAMAN CERITA KAMI (ABOUT)
    // =====================================================

    public function about()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        $sections = AboutSection::orderBy('sort_order')->get();
        return view('admin.pages.about', compact('setting', 'sections'));
    }

    public function aboutUpdate(Request $request)
    {
        $setting = Setting::first();
        $data = $request->only([
            'about_hero_label',
        ]);
        $setting->update($data);
        return redirect()->back()->with('success', 'Teks Hero Cerita Kami berhasil diperbarui.');
    }

    // =====================================================
    // HALAMAN KUNJUNGI KAMI (VISIT)
    // =====================================================

    public function visit()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('admin.pages.visit', compact('setting'));
    }

    public function visitUpdate(Request $request)
    {
        $setting = Setting::first();
        $data = $request->only([
            'address_central',
            'address_branch',
            'visit_cta_title',
            'visit_cta_text',
        ]);

        $extractSrc = function ($input) {
            if (preg_match('/src="([^"]+)"/', $input, $match)) {
                return $match[1];
            }
            return $input;
        };

        if ($request->filled('map_url_central')) {
            $data['map_url_central'] = $extractSrc($request->map_url_central);
        }

        if ($request->filled('map_url_branch')) {
            $data['map_url_branch'] = $extractSrc($request->map_url_branch);
        }

        $setting->update($data);

        return redirect()->back()->with('success', 'Konten Halaman Kunjungi Kami berhasil diperbarui.');
    }
}
