<?php

namespace App\Providers;

use App\Models\Tahun;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\URL;
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


        if (env('APP_ENV') == 'production') {

            URL::forceScheme('https');
        }
    }
}
