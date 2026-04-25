<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $guarded = [];

    /**
     * Ambil atau buat record pertama dengan nilai default.
     */
    public static function getOrCreate(): static
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'hero_title'          => 'Wajah Baru di <br> <span class="italic font-light opacity-90">Tepian Telaga.</span>',
                'hero_subtitle'       => 'Hadir sebagai oase elegan di tengah kesederhanaan Telaga Ngebel. Kami mendefinisikan ulang budaya kopi dengan memadukan lanskap alam yang memukau dan integritas proses <strong>Farm to Cup</strong>.',
                'philosophy_title'    => 'Menggubah Rasa, <br><span class="text-gray-500 italic">Menyempurnakan Cerita.</span>',
                'philosophy_content'  => '<p>Di tengah panorama Telaga Ngebel yang memikat hati, kami menangkap sebuah keheningan yang janggal. Sejauh mata memandang, lanskap kuliner hanya dihiasi oleh kedai tradisional, menyisakan ruang hampa bagi para pencari estetika rasa.</p>',
                'philosophy_image'    => null,
            ]
        );
    }
}
