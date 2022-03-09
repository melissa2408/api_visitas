<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'persons' => $this->faker->numberBetween($min = 2, $max = 11),
            'user_id' => rand(1, 10)
        ];
    }
}
