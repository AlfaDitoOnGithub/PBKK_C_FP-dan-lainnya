<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'tel_number' => fake()->phoneNumber(),
            'res_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'table_id' => fake()->numberBetween(1,5),
            'guest_number' => fake()->numberBetween(1,4),
        ];
    }
}