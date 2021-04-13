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
        for ($i = 0; $i < 10; $i ++) {
            $user = new User();
            $user->name = $faker->firstName();
            $user->last_name = $faker->lastName();
            $user->date_of_birth = $faker->dateTime();
            $user->email = $faker->unique()->safeEmail();
            $user->vat = $faker->numerify('###########');
            $user->password = bcrypt($user['password']);
            $user->save();
        }
    }
}
