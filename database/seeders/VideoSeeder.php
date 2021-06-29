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
                'url'          =>  'https://marketplace.canva.com/EAD8ATWwGKQ/1/0/800w/canva-yellow-and-black-companies-remote-work-16%3A9-video-30H71nWosEs.mp4',
                'type'         =>  'url',
                'desc'         =>  $faker->text(rand(50, 200)),
                'course_id'    =>  Course::select('id')->whereVisibility(true)->inRandomOrder()->first()->id,
            ]);

            $video->tags()->attach([rand(0, 10), rand(0, 10), rand(0, 10)]);
        }
    }
}
