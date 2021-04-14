<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->text(rand(100, 300)),
        'address' => $faker->address(),
        'logo' => 'https://picsum.photos/seed/' . rand(1,1000) . '/200',
    ];
});
