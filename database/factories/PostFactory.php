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
            'user_id' => $this->faker->numberBetween(1, 25),
            'title' => $this->faker->sentence(rand(3, 8)),
            'body' => $this->faker->paragraphs(rand(1, 8), true),
            'image_url' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
