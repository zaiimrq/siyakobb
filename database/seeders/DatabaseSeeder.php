<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'rupbasanjpr@gmail.com',
            'password' => bcrypt('pastinoken'),
            'role' => Role::Admin,
        ]);
        User::create([
            'name' => 'Zulfa',
            'email' => 'zulfa@gmail.com',
            'password' => bcrypt('zulfa30'),
            'role' => Role::Admin,
        ]);
    }
}
