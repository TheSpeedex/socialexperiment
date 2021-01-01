<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory(10)->has(Tag::factory()->count(rand(1,10)))->create();




    }
}
