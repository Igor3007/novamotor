<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        Model::shouldBeStrict(!app()->isProduction());

//        if (!app()->isProduction()) {
//            DB::listen(static function ($query) {
//                if ($query->time > 100) {
//                    logger()
//                        ->channel('daily')
//                        ->debug('longQuery: ' . $query->sql, $query->bindings);
//                }
//            });
//        }
    }
}
