<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "title" => $this->faker->sentence(),
            "content" => $this->faker->paragraph(7),
            "category_id" => Category::factory(),
        ];
    }
}
