<?php

use App\Models\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function shouldRun(): bool
    {
        return DB::table("items")->count() > 0;
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("items", function (Blueprint $table) {
            $table
                ->dateTime("lelang_at")
                ->nullable()
                ->comment("Tanggal lelang barang");
        });

        Item::all()->each(function (?Item $item) {
            if ($item === null) {
                return;
            }
            // Set default lelang_at to null for existing items
            $item->update(["lelang_at" => $item->created_at->addMonth(6)]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("items", function (Blueprint $table) {
            $table->dropColumn("lelang_at");
        });
    }
};
