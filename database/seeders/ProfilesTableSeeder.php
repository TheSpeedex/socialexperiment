<?php

namespace Database\Seeders;


use App\Models\Profiles;

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $a = new Profiles;
        $a-> name = "Liam";
        $a-> email = "Liam@mail.com";
        $a-> password = "password123";
        $a->save();
        $a->post_id = 1;


        Profiles::factory()
        ->times(50)
        ->create();

        
      //  factory(App\Models\Profiles::class, 50)->create();

        
    }
}
