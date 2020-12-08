<?php
namespace Database\Seeders;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();

        User::create([
            'first_name' => 'Barry',
            'last_name' => 'Allen',
            'username' => 'theflash',
            'dark_mode' => true,
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 5; $i++) {
            // User::create([
            //     'first_name' => $faker->first_name,
            //     'last_name' => $faker->last_name,
            //     'username' => $faker->username,
            //     'dark_mode' => $faker->dark_mode,
            // ]);

            User::create([
                'first_name' => "First",
                'last_name' => "Last",
                'username' => "username",
                'dark_mode' => (bool)random_int(0, 1),
            ]);
        }
    }
}