<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function (\Illuminate\View\View $view): void {
            $name = $view->name();

            if ($name !== '' && str_starts_with($name, 'admin.')) {
                return;
            }

            static $siteSettings = null;
            $siteSettings ??= SiteSetting::current();

            $view->with('siteSettings', $siteSettings);
        });
    }
}
