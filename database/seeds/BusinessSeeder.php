<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($u=0; $u < 5 ; $u++) {
            $business = new Business();
            $business->name = $faker->name();
            $business->description = $faker->text(1024);
            $business->type = $faker->text(255);
            $business->address = $faker->address();
            $business->logo = 'https://picsum.photos/seed/' . rand(1,1000) . '/200/300' ;
            $user = User::all();
            $user->business()->save($business);
        }
    }
}
