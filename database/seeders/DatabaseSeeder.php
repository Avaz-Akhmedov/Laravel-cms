<?php

namespace Database\Seeders;




use Carbon\Exceptions\BadComparisonUnitException;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            PostTagSeeder::class
        ]);
    }
}
