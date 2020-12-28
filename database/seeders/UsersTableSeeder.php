<?php

namespace Database\Seeders;


use App\Models\User;

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

        $a = new User;
        $a-> name = "Liam";
        $a-> email = "Liam@mail.com";
        $a-> password = "password123";
        $a->save();
 


        User::factory()
        ->times(10)
        ->create();

        
      //  factory(App\Models\Profiles::class, 50)->create();

        
    }
}
