<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'whatsapp'           => '6281234567890',
                'instagram'          => 'https://instagram.com/rindualamcoffee',
                'tiktok'             => 'https://tiktok.com/@rindualamcoffee',
                'open_hours'         => '08:00 AM — 11:00 PM',
                'address_central'    => 'Tepian Telaga Ngebel, Kec. Ngebel, Kabupaten Ponorogo, Jawa Timur 63493',
                'address_branch'     => 'Jl. HOS Cokroaminoto No.123, Pusat Kota Ponorogo, Jawa Timur',
                
                // Embed Maps (Zincc / Minimalist style usually uses specific parameters, but we supply valid ones)
                'map_url_central'    => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5414840810375!2d111.65487731477833!3d-7.838275994352219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79a0b0b8c6dfbb%3A0x6b876251b14a2c9!2sTelaga%20Ngebel!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid',
                'map_url_branch'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.016390192809!2d111.48833131477884!3d-7.893356994313264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799ff2e8c25dbb%3A0x4a4d6bb9f1165cf!2sPonorogo%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid',
                
                'visit_cta_title'    => 'Rencanakan Kunjungan Anda',
                'visit_cta_text'     => 'Kami pun tak sabar menyambut Anda. Untuk reservasi kelompok, acara khusus, atau sekadar bertanya tentang menu hari ini, silakan hubungi tim kami.',
                
                // Fields that might be shared with Home/About
                'home_hero_title'    => 'Wajah Baru di <br> <span class="italic font-light opacity-90">Tepian Telaga.</span>',
                'home_hero_subtitle' => 'Hadir sebagai oase elegan di tengah kesederhanaan Telaga Ngebel. Kopi kami tumbuh di dataran tinggi Ponorogo — dari kebun kami, langsung ke cangkir Anda.',
                'about_hero_label'   => 'Since 2021',
            ]
        );
    }
}
