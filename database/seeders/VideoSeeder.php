<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Video;
use Faker\Factory;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 15; $i++) {
            $video = Video::create([
                'title'        =>  $faker->sentence(rand(5, 10)),
                'url'          =>  'https://www.youtube.com/watch?v=9m6NwwVTlME&list=PLvNu8E-aj20njrvWNIutPOb8ip1xoLjW2&index=' . rand(1, 80),
                'type'         =>  'url',
                'desc'         =>  $faker->text(rand(50, 200)),
                'course_id'    =>  Course::select('id')->whereVisibility(true)->inRandomOrder()->first()->id,
            ]);

            $video->tags()->attach([rand(0, 10), rand(0, 10), rand(0, 10)]);
        }
    }
}
