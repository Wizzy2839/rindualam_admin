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
        Schema::table('settings', function (Blueprint $table) {
            // Nambahin 2 kolom baru bertipe Text (karena URL bisa panjang)
            $table->text('map_url_central')->nullable();
            $table->text('map_url_branch')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Buat jaga-jaga kalo lu mau rollback
            $table->dropColumn(['map_url_central', 'map_url_branch']);
        });
    }
};
