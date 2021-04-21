<?php

use Illuminate\Database\Seeder;
Use App\Product;
use Faker\Generator as Faker;
use App\Business;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

        $businesses = Business::all();

        foreach($businesses as $business){
            for($i = 0; $i < rand(5, 10); $i++){
                $product = New Product();
                $product->name = $faker->foodName();
                $product->ingredients = $faker->sentence(rand(2, 10));
                $product->description = $faker->text(rand(100, 300));
                $product->price = $faker->randomFloat(2, 6, 70);
                $product->visible = rand(0, 1);
                $product->img = $product->img = 'https://source.unsplash.com/1600x900/?food/' . rand(1, 1000);
                $business->products()->save($product);
            }

        }
    }
}
