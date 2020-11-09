<?php

namespace Database\Seeders;


use App\Models\Comment;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       // $i = new Comment;
      //  $i ->cMessage = "This Is A Comment Message";
     //   $i ->profiles_id = 10;
     //   $i ->posts_id = 15;
     //   $i ->save();

        Comment::factory()
        ->times(10)
        ->create();


 
    }
}
