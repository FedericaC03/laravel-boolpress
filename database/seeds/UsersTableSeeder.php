<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 

            $newUser = New User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->freeEmail();
            $newUser->password = $faker->password();
            $newUser->save();
        }

    }
}
