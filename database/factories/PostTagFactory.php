<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

class PostTagFactory extends Factory
{

    public function definition(): array
    {
//        $post = Post::query()->inRandomOrder()->first();
//        $tag = Tag::query()->inRandomOrder()->first();
        return [
            "post_id" => Post::all()->random()->id,
            "tag_id" => Tag::all()->random()->id
        ];
    }
}
