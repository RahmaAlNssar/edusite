<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(5, 10)),
            'descrption' =>   $this->faker->text(rand(300, 700)),
            'image'=>  $this->faker->image(public_path('uploads/posts/'), 600, 600, 'posts', false),
            'visibility'=>$this->faker->visibility,
            'user_id'=> User::select('id')->inRandomOrder()->first()->id,
        
        ];
    }
}
