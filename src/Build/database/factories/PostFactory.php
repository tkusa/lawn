<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            "title" => $this->faker->text(255),
        "contents" => $this->faker->text(),
        "like" => $this->faker->numberBetween(),
        "published_at" => $this->faker->dateTime(),

        ];
    }

}

