<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Business;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* per chiamare in una volta tutti i seeder
        $this->call([
            UserSeeder::class,
            BusinessSeeder::class,
            TypeSeeder::class,
            ProductSeeder::class,
        ]);
        */

        factory(User::class, 5)->create()->each(function ($user) {
            $business = factory(App\Business::class)->make();
            $user->business()->save($business);

            $product = factory(App\Product::class, rand(5, 10))->make();
            $business->products()->saveMany($product);


        });
    }
}
