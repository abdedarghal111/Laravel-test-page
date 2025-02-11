<?php

namespace Database\Factories;

use App\Models\Directores;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Directores>
 */
class DirectoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellidos' => fake()->lastName() . " " . fake()->lastName(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
