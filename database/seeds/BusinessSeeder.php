<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Business;
use App\User;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {
            $business = new Business();
            $business->name = $faker->name();
            $business->description = $faker->text(1024);
            for ($i = 0; $i < rand(1, 5); $i ++) {
                $business->type = random(1, 12);
            }
            $business->address = $faker->address();
            $business->logo = 'https://picsum.photos/seed/' . rand(1,1000) . '/200/300' ;
            $user->business()->save($business);
        }
    }
}
