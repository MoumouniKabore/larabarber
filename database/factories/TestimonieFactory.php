<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonie>
 */
class TestimonieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

        return [
            'photo' => null,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'message' => $this->faker->paragraph(),
            // Statut aléatoire entre les deux possibilités
            'status' => $this->faker->randomElement(['Pas Encore Publié', 'Publié']),
        ];
    }
}
