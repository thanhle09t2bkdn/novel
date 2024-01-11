<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->count(100)
            ->create()
            ->each(function ($post) {
                $randomTags = Tag::all()->random(rand(0, 4))->pluck('id');
                $post->tags()->attach($randomTags);
//                $user = User::inRandomOrder()->first();
//                $post->user()->save($user);
            });
    }
}
