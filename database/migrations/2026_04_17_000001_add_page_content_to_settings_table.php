<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Kolom untuk halaman About
            $table->string('about_hero_label')->default('Since 2021')->nullable();
            $table->longText('about_origin_content')->nullable();
            $table->string('about_origin_image')->nullable();

            // Kolom untuk halaman Visit
            $table->string('visit_cta_title')->default('Have a Question?')->nullable();
            $table->text('visit_cta_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'about_hero_label',
                'about_origin_content',
                'about_origin_image',
                'visit_cta_title',
                'visit_cta_text',
            ]);
        });
    }
};
