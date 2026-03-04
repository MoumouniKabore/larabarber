<?php

namespace Database\Seeders;

use App\Models\Testimonie;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        Testimonie::factory()->count(6)->create();
    }
}
