<?php

namespace Database\Seeders;

use App\Models\Category;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        $this->call(UserSeeder::class);
        Category::factory(15)->create();
        Post::factory(15)->create();
        Tag::factory(15)->create();
        PostTag::factory(15)->create();
    }
}
