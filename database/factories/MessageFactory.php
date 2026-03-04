<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'phone'      => $this->faker->unique()->phoneNumber(),
            'email'      => $this->faker->unique()->safeEmail(),
            
            // On pioche un sujet au hasard dans ta liste
            'subject'    => $this->faker->randomElement([
                'question générale', 
                'réservation', 
                'partenariat', 
                'réclamation', 
                'critique', 
                'autre'
            ]),
            
            'message'    => $this->faker->paragraph(3),
            'status'     => $this->faker->randomElement(['Pas Encore Vu', 'Répondu']),
        ];
    }
}
