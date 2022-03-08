<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'url_image' => 'https://www.pueblosmexico.com.mx/IMG/arton31753.jpg',
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 5)
        ];
    }
}
