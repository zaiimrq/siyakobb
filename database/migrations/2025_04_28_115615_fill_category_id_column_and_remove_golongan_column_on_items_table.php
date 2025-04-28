<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function shouldRun(): bool
    {
        return $this->hasRequiredColumns() && DB::table('categories')->count() > 0;
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {

        $this->migrateCategories();
        $this->dropGolonganColumn();
    }

    /**
     * Check if required columns exist
     */
    private function hasRequiredColumns(): bool
    {
        return Schema::hasColumn('items', 'category_id') &&
            Schema::hasColumn('items', 'golongan');
    }

    /**
     * Migrate categories from golongan to category_id
     */
    private function migrateCategories(): void
    {
        DB::table('items')->get()->each(function ($item) {
            $this->updateCategoryId($item);
        });
    }

    /**
     * Update category_id for a single item
     */
    private function updateCategoryId($item): void
    {
        $category = DB::table('categories')
            ->where('name', $item->golongan)
            ->first();

        if ($category) {
            DB::table('items')
                ->where('id', $item->id)
                ->update(['category_id' => $category->id]);
        }
    }

    /**
     * Drop the golongan column
     */
    private function dropGolonganColumn(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('golongan');
        });
    }
};
