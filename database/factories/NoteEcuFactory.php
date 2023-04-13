<?php

namespace Database\Factories;

use App\Models\Ecu;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoteEcu>
 */
class NoteEcuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'etudiant_id' => 1,
            // 'ecu_id' => fake()->numberBetween(1, 35),
            // 'note' => $this->faker->numberBetween(5, 16),
        ];
    }
}
