<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Item::select('golongan')->distinct()->pluck('golongan');

        $categories->each(function ($category) {
            Category::create([
                'name' => $category,
            ]);
        });
    }
}
