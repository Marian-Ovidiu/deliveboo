<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($u=0; $u < 5 ; $u++) {
            $user = new User();
            $user->name = $faker->firstName();
            $user->last_name = $faker->lastName();
            $user->date_of_birth = $faker->dateTime();
            $user->email = $faker->email();
            $user->vat = $faker->randomNumber(5, true);
            $user->password = Hash::make($user['password']);
            $user->save();

        }
    }
}
