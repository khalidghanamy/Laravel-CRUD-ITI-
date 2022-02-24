<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
class PostFactory extends Factory
{
    
    
    
     protected $model=Post::class;
    
    
    public function definition()
    {

        

        return [
            
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->text(20),
            'image' =>$this->faker->image,
            'description' => $this->faker->text(200),
          
            

        ];
    }
}
