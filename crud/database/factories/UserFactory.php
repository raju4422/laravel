<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = User::class;
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password'=>Hash::make($this->faker->password()),
            'phone' => $this->faker->phone(),
            'gender' => $this->faker->gender(),
             
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
   
}
