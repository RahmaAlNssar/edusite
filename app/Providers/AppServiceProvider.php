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
use Illuminate\Http\Resources\Json\JsonResource;
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
        JsonResource::withoutWrapping(); // To Remove The data Index From Api Colliction
        Paginator::useBootstrap(); // To Use  Bootstrap Pagination

        SliderImage::observe(SliderImageObserve::class);
        Course::observe(CourseObserve::class);
        Video::observe(VideoObserve::class);
        Post::observe(PostObserve::class);
    }
}
