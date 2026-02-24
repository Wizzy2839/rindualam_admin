<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $data = $request->all();

        // Menggabungkan jam buka dan tutup menjadi satu format (Contoh: 08:00 - 22:00)
        if ($request->filled('open_time') && $request->filled('close_time')) {
            $data['open_hours'] = $request->open_time . ' - ' . $request->close_time;
        }
        unset($data['open_time'], $data['close_time']);

        // Mencegah nilai kosong (NULL) jika admin memaksa memanipulasi HTML
        $data['whatsapp'] = $request->whatsapp ?? '-';
        $data['instagram'] = $request->instagram ?? '#';
        $data['tiktok'] = $request->tiktok ?? '#';

        if ($request->hasFile('home_philosophy_image')) {
            $data['home_philosophy_image'] = $request->file('home_philosophy_image')->store('settings-images', 'public');
        }

        // Mengekstraksi URL dari kode iframe Google Maps
        $extractSrc = function($input) {
            if (preg_match('/src="([^"]+)"/', $input, $match)) {
                return $match[1];
            }
            return $input; 
        };

        if (!empty($data['map_url_central'])) {
            $data['map_url_central'] = $extractSrc($data['map_url_central']);
        }

        if (!empty($data['map_url_branch'])) {
            $data['map_url_branch'] = $extractSrc($data['map_url_branch']);
        }

        $setting->update($data);

        return redirect()->back()->with('success', 'Pengaturan telah berhasil diperbarui ke dalam sistem.');
    }
}