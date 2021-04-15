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
                $product->img = $faker->randomElement([
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F1122495.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7251995.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7234883.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7193347.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7219742.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7159025.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F8716309.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7818569.jpg&w=272&h=272&c=sc&poi=face&q=85',
                  'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F7234883.jpg&w=272&h=272&c=sc&poi=face&q=85'
                  ]);
                $business->products()->save($product);
            }

        }
    }
}
