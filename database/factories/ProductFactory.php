<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{

      /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        $name = $this->faker->realText(rand(40, 50));
        return [
            'name' => $name,
          
            'slug' => Str::slug($name),
        ];

    }
}
