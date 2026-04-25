<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus tabel lama yang tidak jadi dipakai
        Schema::dropIfExists('home_contents');
        Schema::dropIfExists('about_contents');

        // Buat tabel Home Sections yang dinamis
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->text('title');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('image_position')->default('right');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Buat tabel About Sections yang dinamis
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->text('title');
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('image_position')->default('right');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sections');
        Schema::dropIfExists('about_sections');
    }
};
