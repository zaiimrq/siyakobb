<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

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
        $this->configureDates();

    }

    private function configureDates(): void
    {
        Date::use(CarbonImmutable::class);
    }

    private function configureVites(): void
    {
        Vite::useAggressivePrefetching();
    }

    private function configureModels(): void
    {
        Model::shouldBeStrict(
            ! app()->isProduction()
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
