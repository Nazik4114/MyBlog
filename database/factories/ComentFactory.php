<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'=>$this->faker->numberBetween(1,1250),
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'body'=>$this->faker->paragraphs(rand(1,8),true),
        ];
    }
}
