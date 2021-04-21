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
        $business->name = $faker->randomElement([
            'McDonalds',
            'Rosso Pomodoro',
            'Pizzeria Da Mario',
            'La Spaghetteria',
            'Fish & Fries',
            'Big Belly Burger',
            'Buenos Aires - Steck House',
            'Porchetterìa da Adriano',
            'Kebab Al Sa Lì',
            'Gambero Rosso',
            'Tonnarello',
            'Pizza & Pasta',
            'Trattorìa da Gennaro',
            'L\'Ostrica'
        ]);
        $business->description = $faker->text(100);
        $business->address = $faker->address();
        $business->closing_day = $faker->randomElement([
            'Domenica',
            'Sabato',
            'Venerdì',
            'Giovedì',
            'Mercoledì',
            'Martedì',
            'Lunedì'
        ]);
        $business->opening_time = $faker->time;
        $business->closing_time = $faker->time;
        $business->logo = $business->logo = 'https://source.unsplash.com/1600x900/?restaurant/' . rand(1, 1000);
        $business->telephone = $faker->numerify('##########');
        $business->email = $faker->unique()->safeEmail();
        $business->website = $faker->url();
        $user->business()->save($business);
      }
    }
  }
