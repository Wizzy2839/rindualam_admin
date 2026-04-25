<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
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
                'hero_label'     => 'Since 2021',
                'origin_content' => null,
                'origin_image'   => null,
            ]
        );
    }
}
