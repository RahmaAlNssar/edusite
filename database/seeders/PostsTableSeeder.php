<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        $posts=[];
        for($i=0; $i<10; $i++){
         
            $days = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28'];
            $months = ['01','02'];
            $date_post="2021-" . \Illuminate\Support\Arr::random($months) . "-" .\Illuminate\Support\Arr::random($days) ;
            $posts[]=[
            'title' => $this->faker->sentence(rand(5, 10)),
            'descrption' =>   $this->faker->text(rand(300, 700)),
            'image'=>  $this->faker->image(public_path('uploads/posts/'), 600, 600, 'posts', false),
            'visibility'=>$this->faker->visibility,
            'user_id'=> User::select('id')->inRandomOrder()->first()->id,
            'created_at'=> $date_post,
            'updated_at'=>$date_post

            ];


        }
        $chunks=array_chunk($posts,5);
        foreach($chunks as $chunk){
            \App\Models\Post::insert($chunk);
        }
    }
}
