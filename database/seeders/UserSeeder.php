<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@sanggar.com',
            'password' => Hash::make('admin123'), // jangan lupa hashing
            'phone' => '08123456789',
            'address' => 'Jl. Admin No.1, Padang',
            'role' => 'admin',
        ]);

        // Buat akun User (pengunjung)
        User::create([
            'name' => 'Pengunjung Satu',
            'email' => 'user@sanggar.com',
            'password' => Hash::make('123'),
            'phone' => '08987654321',
            'address' => 'Jl. User No.99, Padang',
            'role' => 'user',
        ]);
    }
}
