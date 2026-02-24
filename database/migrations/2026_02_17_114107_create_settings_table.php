<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp')->default('6281234567890');
            $table->string('instagram')->default('https://instagram.com/rindualamcoffee');
            $table->string('tiktok')->default('https://tiktok.com/@rindualamcoffee');
            $table->string('open_hours')->default('08:00 AM — 11:00 PM');
            $table->text('address_central')->nullable();
            $table->text('address_branch')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
