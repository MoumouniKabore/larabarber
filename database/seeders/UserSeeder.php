<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création de l'Administrateur
        User::factory()->create([
            'photo' => null,
            'first_name' => 'Kabore',
            'last_name' => 'Moumouni',
            'phone' => '0200001100',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'status' => 'Actif',
            'password' => Hash::make('admin123'),
        ]);
    }
}
