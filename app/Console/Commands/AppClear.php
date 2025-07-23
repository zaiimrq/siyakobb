<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the application cache, routes, views, and config';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing application cache...');
        $this->call('optimize:clear');

        if (class_exists('Filament\\Facades\\Filament')) {
            $this->call('filament:optimize-clear');
        }
    }
}
