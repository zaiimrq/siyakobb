<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrateItemColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:migrate-column';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate item column from old column to new column';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (! Schema::hasColumn('items', 'category_id')) {
            $this->error('category_id column does not exist in items table');

            return;
        }
        if (! Schema::hasColumn('items', 'golongan')) {
            $this->error('Item column has been migrated');

            return;
        }

        $this->info('Migrating item column...');

        $items = DB::table('items')->get();

        $items->each(function ($item) {
            $this->migrateGolonganColumn($item);
        });
        $this->info('Drop golongan column');
        $this->dropGolonganColumn();
        $this->info('Item column migration completed successfully.');
    }

    private function migrateGolonganColumn($item): void
    {

        $category = DB::table('categories')->where('name', $item->golongan)->first();

        if ($category) {
            DB::table('items')->where('id', $item->id)->update([
                'category_id' => $category->id,
            ]);
        }
    }

    private function dropGolonganColumn(): void
    {
        Schema::table('items', function ($table) {
            $table->dropColumn('golongan');
        });
    }
}
