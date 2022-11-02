<?php

namespace Database\Factories;

use App\Models\Image;
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
        $mas=Image::all();
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(rand(3, 8)),
            'body' => $this->faker->paragraphs(rand(1, 8), true),
            'image_url' => $mas[rand(0,19)]->path,
        ];
    }
}
