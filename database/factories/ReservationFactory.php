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
            'table_id'              => 1,
            'email'                 => $this->faker->email(),
            'name'                  => $this->faker->name(),
            'guest'                 => 2,
            'date'                  => $this->faker->date(),
        ];
    }
}
