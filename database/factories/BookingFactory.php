<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory {
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'service' => $this->faker->randomElement(['Classique', 'Premium', 'VIP', 'Coupe Classique', 'Coupe Moderne', 'Taille de Barbe', 'Coupe + Barbe', 'Rasage Traditionnel', 'Coloration', 'Soin Visage', 'Coupe Enfant']),
            'day' => $this->faker->randomElement(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']),
            'time' => $this->faker->randomElement(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00']),
            'status' => $this->faker->randomElement(["Pas Encore Vu", "Répondu"]),
        ];
    }
}
