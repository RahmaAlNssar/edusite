<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Course;
use App\Models\Video;
use App\Models\User;
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
        Category::query()->delete();
        Course::query()->delete();
        Video::query()->delete();
        User::query()->delete();
        Tag::query()->delete();
        // end


        User::factory(50)->create();
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
    }
}
