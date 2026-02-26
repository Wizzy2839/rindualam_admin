<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * 
     * KEAMANAN: Ini adalah SATU-SATUNYA cara untuk menambahkan akun admin.
     * Registrasi publik telah dinonaktifkan sepenuhnya.
     * 
     * Cara penggunaan:
     *   php artisan db:seed
     * 
     * Untuk menambah admin baru, tambahkan entry baru di array $admins
     * lalu jalankan: php artisan db:seed --force
     */
    public function run(): void
    {
        $admins = [
            [
                'name'     => 'Administrator',
                'email'    => 'admin@rindualam.com',
                'password' => Hash::make('RinduAlam2026!'),
            ],
            // Tambahkan admin baru di sini jika diperlukan:
            // [
            //     'name'     => 'Admin Kedua',
            //     'email'    => 'admin2@rindualam.com',
            //     'password' => Hash::make('PasswordKuat123!'),
            // ],
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name'              => $admin['name'],
                    'password'          => $admin['password'],
                    'email_verified_at' => now(),
                ]
            );
        }

        $this->command->info('✅ ' . count($admins) . ' akun admin berhasil disinkronkan.');
    }
}
