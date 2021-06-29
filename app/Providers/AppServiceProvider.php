<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\SliderImageObserve;
use App\Observers\CourseObserve;
use App\Observers\VideoObserve;
use App\Observers\PostObserve;
use App\Models\SliderImage;
use App\Models\Course;
use App\Models\Video;
use App\Models\Post;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        SliderImage::observe(SliderImageObserve::class);
        Course::observe(CourseObserve::class);
        Video::observe(VideoObserve::class);
        Post::observe(PostObserve::class);
    }
}
