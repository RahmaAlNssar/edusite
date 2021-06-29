<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
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
            'title'         => $this->faker->sentence(rand(5, 10)),
            'desc'          => $this->faker->text(rand(300, 700)),
            'image'         => $this->faker->image(public_path('uploads/posts/'), 360, 229, 'posts', false),
            'visibility'    => rand(0, 1),
            'user_id'       => User::select('id')->inRandomOrder()->first()->id,
            'category_id'   => Category::select('id')->inRandomOrder()->first()->id,
        ];
    }
}
