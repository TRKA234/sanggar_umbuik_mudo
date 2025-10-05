<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin ' . Str::random(5),
            'email' => 'admin' . Str::random(3) . '@example.com',
            'password' => Hash::make('password123'), // password default
            'phone' => '08' . rand(100000000, 999999999),
            'address' => 'Alamat Admin ' . Str::random(10),
            'role' => 'admin',
        ]);
    }
}
