<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

    return [
        'name' => $faker->foodName(),
        'ingredients' => $faker->sentence(rand(2, 10)),
        'description' => $faker->text(rand(100, 300)),
        'price' => $faker->randomFloat(2, 6, 70),
        'visible' => rand(0, 1),
        'img' => 'https://picsum.photos/seed/' . rand(1,1000) . '/200',
    ];
});
