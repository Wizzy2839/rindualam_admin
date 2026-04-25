<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama
        Schema::disableForeignKeyConstraints();
        AboutSection::truncate();
        Schema::enableForeignKeyConstraints();

        $sections = [
            [
                'sort_order'     => 1,
                'label'          => 'The Beginning',
                'title'          => 'Lahir dari Rindu,\nTumbuh di Tepian Telaga.',
                'image_position' => 'right',
                'content'        => '
<p>Rindu Alam bukan sekadar nama. Ia adalah perasaan yang kami tuangkan ke dalam setiap cangkir — kerinduan pada alam, pada kesederhanaan, dan pada rasa yang jujur.</p>
<p>Berdiri sejak 2021 di tepian Telaga Ngebel, Ponorogo, kami hadir bukan hanya sebagai kedai kopi. Kami adalah titik temu antara panorama alam yang menenangkan dan pengalaman minum kopi yang tak terlupakan.</p>
',
            ],
            [
                'sort_order'     => 2,
                'label'          => 'Farm to Cup',
                'title'          => 'Dari Kebun Kami,\nLangsung ke Cangkir Anda.',
                'image_position' => 'left',
                'content'        => '
<p>Kami adalah salah satu sedikit kedai yang benar-benar menguasai seluruh rantai produksi — mulai dari lahan tanam kopi di dataran tinggi Ponorogo, proses <em>roasting</em> di fasilitas sendiri, hingga penyajian di tangan barista terlatih kami.</p>
<p>Tidak ada perantara. Tidak ada kompromi. Inilah yang membuat setiap tegukan Rindu Alam terasa berbeda — karena ia lahir dari kendali penuh dan cinta yang tulus terhadap kopi.</p>
',
            ],
            [
                'sort_order'     => 3,
                'label'          => 'Our Philosophy',
                'title'          => 'Kualitas Bukan Pilihan,\nMelainkan Komitmen.',
                'image_position' => 'right',
                'content'        => '
<p>Di Rindu Alam, kualitas bukan standar minimum — ia adalah titik awal. Setiap biji kopi dipilih dengan teliti, setiap proses roasting diawasi dengan presisi, dan setiap seduhan diramu dengan kesabaran seorang pengrajin.</p>
<p>Kami percaya bahwa kopi yang baik adalah kopi yang bercerita. Dan setiap cerita layak untuk disampaikan dengan cara yang terbaik.</p>
',
            ],
            [
                'sort_order'     => 4,
                'label'          => 'The Place',
                'title'          => 'Lebih dari Sekadar\nTempat Minum Kopi.',
                'image_position' => 'left',
                'content'        => '
<p>Berlokasi di tepi Telaga Ngebel yang ikonik, Rindu Alam menawarkan suasana yang tidak bisa ditemukan di tempat lain. Angin pegunungan yang sejuk, panorama air yang membentang, dan aroma kopi yang menguar — menciptakan harmoni yang sempurna.</p>
<p>Kami merancang setiap sudut ruang kami agar terasa seperti pelarian singkat dari rutinitas. Tempat di mana waktu sedikit melambat, dan setiap momen layak untuk dinikmati sepenuhnya.</p>
',
            ],
        ];

        foreach ($sections as $section) {
            // Rapihkan whitespace di konten
            $section['content'] = trim($section['content']);
            $section['title']   = str_replace('\n', '<br>', $section['title']);
            AboutSection::create($section);
        }
    }
}
