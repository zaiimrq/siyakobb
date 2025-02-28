<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Vite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureVites();
        $this->configureModels();
        $this->configureDB();

    }

    private function configureVites(): void
    {
        Vite::useAggressivePrefetching();
    }

    private function configureModels(): void
    {
        Model::shouldBeStrict(
            !app()->isProduction()
        );
        Relation::morphMap([
            'item' => \App\Models\Item::class,
            'user' => \App\Models\User::class,
            // 'group' => \App\Models\Group::class
        ]);
    }

    private function configureDB(): void
    {
        DB::prohibitDestructiveCommands(
            app()->isProduction()
        );
    }
}
