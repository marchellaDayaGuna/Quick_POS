<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com', // Ganti dengan email admin yang diinginkan
            'password' => Hash::make('admin'), // Ganti dengan password yang diinginkan
            'role' => 1, // Jika Anda memiliki kolom role untuk membedakan admin
        ]);
    }
}
