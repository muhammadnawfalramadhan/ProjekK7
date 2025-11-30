<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk Super Admin
        User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('supersecurepassword'), // password di-hash
            'nama_lengkap' => 'Super Admin',
            'role' => 'admin', // Role Super Admin
        ]);

        // Seeder untuk Admin
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'), // password di-hash
            'nama_lengkap' => 'Administrator',
            'role' => 'admin', // Role Admin
        ]);

        // Seeder untuk Bendahara
        User::create([
            'username' => 'bendahara',
            'email' => 'bendahara@example.com',
            'password' => Hash::make('bendahara123'), // password di-hash
            'nama_lengkap' => 'Bendahara',
            'role' => 'Bendahara', // Role Bendahara
        ]);

        // Seeder untuk Tukang Timbang
        User::create([
            'username' => 'tukang_timbang',
            'email' => 'tukangtimbang@example.com',
            'password' => Hash::make('timbangpassword'), // password di-hash
            'nama_lengkap' => 'Tukang Timbang',
            'role' => 'Tukang Timbang', // Role Tukang Timbang
        ]);

        // Seeder untuk pengguna lainnya (contoh: Test User)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin', // Role sesuai kebutuhan
        ]);
    }
}
