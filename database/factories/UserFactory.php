<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'first_name' => $this->faker->firstName,
        //     'last_name' => $this->faker->lastName,
        //     'username' => $this->faker->userName,
        //     'remember_token' => Str::random(10),
        // ];

        return [
            'first_name' => "First",
            'last_name' => "Last",
            'username' => "username",
            'dark_mode' => (bool)random_int(0, 1),
        ];
    }
}
