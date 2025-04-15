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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Abidal Farzan Rosyidi',
            'email' => 'abidalfar@gmail.com',
            'username' => 'abidalfarzan',
            'role' => 'user',
            'password' => bcrypt(12345678),
        ]);

    }
}
