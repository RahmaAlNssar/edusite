<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SliderImage;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Course;
use App\Models\Video;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // make all tables is empty
        SliderImage::query()->delete();
        Category::query()->delete();
        Slider::query()->delete();
        Course::query()->delete();
        Video::query()->delete();
        Post::query()->delete();
        User::query()->delete();
        Tag::query()->delete();
        // end

        foreach (glob(public_path('uploads/*/*.*')) as $file)
            unlink($file);

        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);

        User::factory(50)->create();
        Course::factory(10)->create();
        $this->call(VideoSeeder::class);
        $this->call(UserSeeder::class);
        Post::factory(10)->create();
        Slider::factory(1)->create();
        SliderImage::factory(3)->create();
    }
}
