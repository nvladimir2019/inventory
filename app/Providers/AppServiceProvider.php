<?php

namespace App\Providers;

use App\Services\Contracts\WorkplaceService;
use App\Services\Implement\WorkplaceServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WorkplaceService::class, function() {
            return new WorkplaceServiceImpl;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
