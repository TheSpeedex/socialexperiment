<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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




     $user=User::create([
      'name' => 'admin',
     'email' => 'admin@admin.com',
      'role' => 'admin',
     'password' => Hash::make('password'),
  ]);
  $user->image()->create(['filename'=>"avatar.png"]);
      
  
 # $user = new User;
 #    $user ->role = "admin";
 #     $user->name = "mTest";
 #     $user->email = "mTest@test.com";
#      $user->image()->create(['filename'=>"avatar.png"]);
 #     $user->filename="test";
 #     $user->password=Hash::make("password");
  #    $user -> save();
      




      \App\Models\User::factory(10)->has(Image::factory())->create();
        
      //  factory(App\Models\Profiles::class, 50)->create();

        
    }
}
