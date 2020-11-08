<?php

namespace Database\Seeders;

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

        $e = new Post;
        $e->headline = "This Headline";
        $e->message = "This Message";
        $e->save();
        



    }
}
