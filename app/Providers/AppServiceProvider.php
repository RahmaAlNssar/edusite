<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\VideoObserve;
use App\Models\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Video::observe(VideoObserve::class);
    }
}
