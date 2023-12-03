<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Table '.fake()->words(1, true),
            'capacity' => fake()->numberBetween(4,6),
            'status' => Arr::random(['available', 'unavailable']),
            'location' => Arr::random(['outdoor', 'indoor'])
        ];
    }
}
