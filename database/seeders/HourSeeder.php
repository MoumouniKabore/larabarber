<?php

namespace Database\Seeders;

use App\Models\Hour;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['day' => 'Lundi', 'time' => '08:00 - 18:00'],
            ['day' => 'Mardi', 'time' => '08:00 - 18:00'],
            ['day' => 'Mercredi', 'time' => '08:00 - 18:00'],
            ['day' => 'Jeudi', 'time' => '08:00 - 18:00'],
            ['day' => 'Vendredi', 'time' => '08:00 - 18:00'],
            ['day' => 'Samedi', 'time' => 'Démi-journée'], // Exemple de demi-journée
            ['day' => 'Dimanche', 'time' => 'Fermé'],
        ];

        foreach ($days as $day) {
            Hour::updateOrCreate(['day' => $day['day']], ['time' => $day['time']]);
        }
    }
}
