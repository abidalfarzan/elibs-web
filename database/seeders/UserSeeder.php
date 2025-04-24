<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "slug" => "admin",
            "email" => "admin@admin.com",
            "role" => "admin",
            "password" => bcrypt("12345678")
        ]);
        User::create([
            "name" => "Abidal Farzan Rosyidi",
            "slug" => "abidal-farzan-rosyidi",
            "email" => "abidalfarzan02@gmail.com",
            "role" => "user",
            "password" => bcrypt("12345678")
        ]);
    }
}
