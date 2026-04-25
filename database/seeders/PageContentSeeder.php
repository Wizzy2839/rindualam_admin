<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    /**
     * Pindahkan data dari tabel settings ke home_contents & about_contents.
     * Aman: hanya insert jika tabel masih kosong (tidak menimpa data baru).
     */
    public function run(): void
    {
        $setting = DB::table('settings')->first();

        // ── HOME CONTENT ──────────────────────────────────────────
        if (DB::table('home_contents')->count() === 0) {
            DB::table('home_contents')->insert([
                'id'                 => 1,
                'hero_title'         => $setting->home_hero_title         ?? 'Wajah Baru di <br> <span class="italic font-light opacity-90">Tepian Telaga.</span>',
                'hero_subtitle'      => $setting->home_hero_subtitle      ?? 'Hadir sebagai oase elegan di tengah kesederhanaan Telaga Ngebel.',
                'philosophy_title'   => $setting->home_philosophy_title   ?? 'Menggubah Rasa, <br><span class="text-gray-500 italic">Menyempurnakan Cerita.</span>',
                'philosophy_content' => $setting->home_philosophy_content ?? '<p>Di tengah panorama Telaga Ngebel yang memikat hati, kami menangkap sebuah keheningan yang janggal.</p>',
                'philosophy_image'   => $setting->home_philosophy_image   ?? null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);

            $this->command->info('✔ Home content berhasil dipindahkan ke tabel home_contents.');
        } else {
            $this->command->warn('⚠ home_contents sudah berisi data, seeder dilewati.');
        }

        // ── ABOUT CONTENT ─────────────────────────────────────────
        if (DB::table('about_contents')->count() === 0) {
            DB::table('about_contents')->insert([
                'id'             => 1,
                'hero_label'     => $setting->about_hero_label    ?? 'Since 2021',
                'origin_content' => $setting->about_origin_content ?? null,
                'origin_image'   => $setting->about_origin_image   ?? null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);

            $this->command->info('✔ About content berhasil dipindahkan ke tabel about_contents.');
        } else {
            $this->command->warn('⚠ about_contents sudah berisi data, seeder dilewati.');
        }
    }
}
