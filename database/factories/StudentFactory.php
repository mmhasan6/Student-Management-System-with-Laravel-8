<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'roll_id' => rand(1, 100),
            'email' => $this->faker->unique()->safeEmail,
            'gender' => rand(0, 1),
            'date_of_birth' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'password' => $this->faker->password,
            'profile_picture' => $this->faker->image,
        ];
    }
}
