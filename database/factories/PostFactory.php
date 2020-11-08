<?php

namespace Database\Factories;

use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'message'=>$this->faker->unique()->safeEmail,
            'profiles_id' => function(){
                return factory(App\Profiles::class)->create()->id;
            }






            //
        ];
    }
}
