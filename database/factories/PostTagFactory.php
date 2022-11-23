<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

class PostTagFactory extends Factory
{

    public function definition(): array
    {
        return [
            "tag_id" => Tag::factory(),
            "post_id" => Post::factory()
        ];
    }
}
