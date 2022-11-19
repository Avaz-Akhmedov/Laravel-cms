<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostsFactory extends Factory
{

    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "title" => $this->faker->sentence(),
            "content" => $this->faker->paragraph(5),
            "category" => $this->faker->randomElement(["education", "health", "sport", "lifestyle"]),
            "tags" => "trending,hot,new"

        ];
    }
}
