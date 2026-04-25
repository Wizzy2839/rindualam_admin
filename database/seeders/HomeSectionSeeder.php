<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HomeSectionSeeder extends Seeder
{
    public function run(): void
    {
        // ── HERO BANNER VIDEO (Seksi Intro) ───────────────────────
        $setting = Setting::firstOrCreate(['id' => 1]);
        $setting->update([
            'home_hero_title'    => 'Wajah Baru di <br> <span class="italic font-light opacity-90">Tepian Telaga.</span>',
            'home_hero_subtitle' => 'Hadir sebagai oase elegan di tengah kesederhanaan Telaga Ngebel. Kopi kami tumbuh di dataran tinggi Ponorogo — dari kebun kami, langsung ke cangkir Anda.',
        ]);

        // ── DYNAMIC HOME SECTIONS ─────────────────────────────────
        Schema::disableForeignKeyConstraints();
        HomeSection::truncate();
        Schema::enableForeignKeyConstraints();

        $sections = [
            [
                'sort_order'     => 1,
                'label'          => 'Our Philosophy',
                'title'          => 'Menggubah Rasa,<br><span class="italic font-light text-gray-500">Menyempurnakan Cerita.</span>',
                'image_position' => 'right',
                'content'        => '
<p>Di tengah panorama Telaga Ngebel yang memikat hati, kami menangkap sebuah keheningan yang janggal — kopi yang tersaji di sini belum berbicara. Kami hadir untuk mengubah itu.</p>
<p>Rindu Alam berdiri di atas satu keyakinan sederhana: bahwa kopi yang baik seharusnya memiliki cerita. Dan cerita terbaik dimulai dari biji yang diperlakukan dengan hormat dan penuh presisi.</p>
',
            ],
            [
                'sort_order'     => 2,
                'label'          => 'Farm to Cup',
                'title'          => 'Dari Dataran Tinggi Ponorogo,<br>Langsung ke Genggaman Anda.',
                'image_position' => 'left',
                'content'        => '
<p>Tidak ada jarak antara ladang dan cangkir kami. Proses tanam, panen, roasting, hingga penyajian sepenuhnya kami kendalikan — memastikan setiap tegukan mencerminkan kualitas tanpa kompromi.</p>
<p>Inilah yang kami sebut <em>Farm to Cup</em>: bukan sekadar label, melainkan sebuah janji yang kami penuhi setiap hari, satu cangkir pada satu waktu.</p>
',
            ],
            [
                'sort_order'     => 3,
                'label'          => 'The Craft',
                'title'          => 'Presisi di Setiap Seduhan,<br><span class="italic font-light text-gray-500">Passion di Setiap Tetes.</span>',
                'image_position' => 'right',
                'content'        => '
<p>Barista kami bukan sekadar penyeduh — mereka adalah pengrajin. Setiap ekstraksi diukur, setiap suhu diperhitungkan, dan setiap sajian dijaga konsistensinya dengan standar yang tidak pernah berkompromi.</p>
<p>Dari V60 pour-over hingga espresso klasik, kami memperlakukan setiap cangkir dengan kehormatan yang sama seperti seorang seniman memperlakukan kanvasnya.</p>
',
            ],
            [
                'sort_order'     => 4,
                'label'          => 'The Experience',
                'title'          => 'Lebih dari Sekadar Kopi —<br>Sebuah Momen.',
                'image_position' => 'left',
                'content'        => '
<p>Duduk di Rindu Alam adalah keputusan untuk berhenti sejenak. Hembusan angin dari Telaga Ngebel, aroma roasting yang melayang di udara, dan kursi yang terasa seperti pulang ke rumah — semua itu bukan aksesori, melainkan bagian dari sajian kami.</p>
<p>Kami percaya bahwa momen terbaik dalam hidup sering tercipta atas secangkir kopi yang tepat, di tempat yang tepat, di waktu yang paling sederhana.</p>
',
            ],
        ];

        foreach ($sections as $section) {
            $section['content'] = trim($section['content']);
            HomeSection::create($section);
        }
    }
}
