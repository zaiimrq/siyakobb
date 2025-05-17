<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

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
