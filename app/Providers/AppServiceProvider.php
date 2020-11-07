<?php

namespace App\Providers;

use App\Services\Contracts\EmployeeService;
use App\Services\Contracts\InventoryService;
use App\Services\Contracts\WorkplaceService;
use App\Services\Implement\EmployeeServiceImpl;
use App\Services\Implement\InventoryServiceImpl;
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

        $this->app->singleton(InventoryService::class, function() {
            return new InventoryServiceImpl();
        });

        $this->app->singleton(EmployeeService::class, function() {
            return new EmployeeServiceImpl();
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
