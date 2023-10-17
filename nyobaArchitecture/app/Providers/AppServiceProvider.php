<?php

namespace App\Providers;

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
        // Register view namespaces
        foreach (scandir($path = app_path('Modules')) as $moduleDir) {
        view::addNamespace($moduleDir, "{$path}/{$moduleDir}/Presentation/views");
    
        Blade::componentNamespace("App\\Modules\\{$moduleDir}
        \\Presentation\\Components", $moduleDir);
        }
    }
}
