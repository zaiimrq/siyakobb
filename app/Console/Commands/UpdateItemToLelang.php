<?php

namespace App\Console\Commands;

use App\Enums\ExecutionStatus;
use App\Models\Item;
use Illuminate\Console\Command;

class UpdateItemToLelang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-item-to-lelang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Item::query()
            ->whereNull('eksekusi')
            ->each(function (Item $item) {
                if ($item->lelang_at <= now()) {
                    $item->update([
                            'eksekusi' => ExecutionStatus::Dilelang,
                            'lelang_at' => now()->addMonth(6),
                        ]);
                }
            });
    }
}
