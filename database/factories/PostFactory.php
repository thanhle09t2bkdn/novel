<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'category_id' =>  Category::inRandomOrder()->first()->id,
            'name' => $this->faker->jobTitle(),
            'image' => 'https://svgsilh.com/svg/1327960.svg',
        ];
    }

}
