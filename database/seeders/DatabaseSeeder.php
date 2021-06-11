<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Course;
use App\Models\Video;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;

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
        Post::query()->delete();
        // end

        foreach (glob(public_path('uploads/*/*.*')) as $file)
            unlink($file);


        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
<<<<<<< HEAD
        $this->call(PageSeeder::class);
=======
>>>>>>> a6af0ae86812d34c9b9650e61a63e1c53fc2a9e8

        User::factory(50)->create();
        Course::factory(10)->create();
        Post::factory(10)->create();
    }
}
