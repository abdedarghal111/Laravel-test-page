<?php

namespace Database\Factories;

use App\Models\Directores;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cortos>
 */
class CortosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->name(),
            'sinopsis' => fake()->paragraph(),
            'director_id' => Directores::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
