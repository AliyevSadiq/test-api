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
            'title'=>$this->faker->unique()->text(10),
            'description'=>$this->faker->unique()->text(100),
            'video_url'=>$this->faker->url,
        ];
    }
}
