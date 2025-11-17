<?php

namespace Database\Seeders;

use App\Enums\UserRole;
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
        User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin"),
            "role" => UserRole::Admin,
        ]);
        User::create([
            "name" => "User",
            "email" => "uzer@user.com",
            "password" => bcrypt("user"),
            "role" => UserRole::User,
        ]);
    }
}
