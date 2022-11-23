<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            "name" => $this->faker->randomElement(["sport","lifestyle","health","education","food","other"]),
        ];
    }
}
