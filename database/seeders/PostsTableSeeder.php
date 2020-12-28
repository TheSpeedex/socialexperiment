<?php

namespace Database\Seeders;

use App\Models\Post;

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
       $e->message = "This Message";
       $e->users_id = 5;
       $e->save();

       
       $e = new Post;
       $e->message = "Try again";
       $e->users_id = 6;
       $e->save();
        

       Post::factory()
        ->times(10)
        ->create();



    }
}
