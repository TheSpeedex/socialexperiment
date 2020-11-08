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
        $e->profiles_id = 1;
        $e->save();
        



    }
}
