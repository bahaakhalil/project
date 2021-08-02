<?php

namespace Database\Seeders;

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
        // $post = new Post();
        // $post->title = "How to learn PHP";
        // $post->body = "How to go PHP";
        // $post->category_id = 1;
        // $post->user_id = 1;
        // $post->save();
        // $post->tags()->attach([1,2]);

        Post::factory(20)->has(Tag::factory(2))->create();
    }
}
