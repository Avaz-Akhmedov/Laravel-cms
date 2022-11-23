<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
           "name" => "admin",
           "email" => "admin@gmail.com|unique:users,email",
           "password" => bcrypt("admin"),
            "is_admin" => 1
        ]);
    }
}
