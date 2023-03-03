<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(300)->create();

        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id'  =>  $post->id,
                'imageable_type'=>  Post::class,
            ]);

            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
