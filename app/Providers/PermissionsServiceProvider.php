<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive("access", function($role) {
            return "<?php if(auth()->check() && auth()->user()->hasPermission({$role})): ?>";
        });

        Blade::directive("endaccess", function() {
            return "<?php endif; ?>";
        });
    }
}
