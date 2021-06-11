<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\CourseObserve;
use App\Observers\VideoObserve;
use App\Observers\PostObserve;
use App\Observers\SliderImageObserve;
use App\Models\Course;
use App\Models\Video;
use App\Models\Post;
use App\Models\SliderImage;

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
        Course::observe(CourseObserve::class);
        Video::observe(VideoObserve::class);
        Post::observe(PostObserve::class);
        SliderImage::observe(SliderImageObserve::class);
    }
}
