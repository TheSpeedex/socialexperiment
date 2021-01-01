<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



      \App\Models\Post::factory(10)->has(Image::factory())->create();
        
      //  factory(App\Models\Profiles::class, 50)->create();

        
    }
}
