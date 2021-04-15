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
      $business->name = $faker->unique()->randomElement([
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
      $business->description = $faker->text(1024);
      $business->address = $faker->address();
      $business->closing_day = rand(0, 7);
      $business->opening_time = $faker->time;
      $business->closing_time = $faker->time;
      $business->logo = $faker->unique()->randomElement([
        'https://www.logodesign.net/logo-new/food-truck-merged-with-slices-of-pizza-8781ld.png?size=1&industry=restaurant-food&bg=0',
        'https://www.logodesign.net/logo-new/stacked-sushi-rolls-on-a-plate-8831ld.png?size=1&industry=restaurant-food&bg=0',
        'https://www.logodesign.net/logo-new/cube-shaped-food-truck-with-pizza-pyramid-8777ld.png?size=1&industry=restaurant-food&bg=0',
        'https://www.logodesign.net/logo-new/grocery-store-door-merged-with-awning-of-food-items-9059ld.png?size=1&industry=restaurant-food&bg=0',
        'https://www.logodesign.net/logo-new/hot-steak-with-hut-in-the-back-8142ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/chips-and-cheese-forming-fish-7995ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/hot-dog-in-bun-with-green-sauce-7602ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/popcorn-snack-7581ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/tomato-with-negative-space-spoon-fork-knife-7248ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/abstract-burger-6342ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo/spoon-and-knife-creating-heart-shape-590ld.png?size=2&industry=All&bg=0',
        'https://www.logodesign.net/logo/spoon-and-a-fork-with-chef-hat-1425ld.png?size=2&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/prawn-with-sun-8406ld.png?size=1&industry=All&bg=0',
        'https://www.logodesign.net/logo-new/fish-on-two-ended-forks-inside-cloche-8023ld.png?size=1&industry=All&bg=0'
        ]);
        $user->business()->save($business);
      }
    }
  }
