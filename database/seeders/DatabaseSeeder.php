<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([ItemSeeder::class]);

        User::create([
            'name' => 'Admin',
            'email' => 'rupbasanjpr@gmail.com',
            'password' => 'pastinoken',
            'role' => Role::Admin,
        ]);
        User::create([
            'name' => 'Zulfa',
            'email' => 'zulfa@gmail.com',
            'password' => 'zulfa30',
            'role' => Role::Admin,
        ]);
    }
}
