<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache';

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
        $this->call('optimize:clear');
        $this->call('optimize');
        if (class_exists('Filament\\Facades\\Filament')) {
            $this->call('filament:optimize-clear');
            $this->call('filament:optimize');
        }
    }
}
