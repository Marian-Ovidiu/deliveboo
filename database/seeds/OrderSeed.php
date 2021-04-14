<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;
use Faker\Generator as Faker;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 20; $i++){
            $order = new Order();
            $order->customer_name = $faker->firstName();
            $order->customer_last_name = $faker->lastName();
            $order->customer_email = $faker->email();
            $order->customer_telephone = $faker->phoneNumber();
            $order->customer_address = $faker->address();
            $order->notes = $faker->text(50);
            $order->amount = $faker->randomFloat(2, 8, 150);
            $order->success = rand(0, 1);
            $order->save();
        }

        $products = Product::all();
        $orders = Order::all();


        foreach($products as $product){
            for($i = 0; $i < rand(1, 3); $i++){
                $product->orders()->save($orders[rand(0, 19)]);
            }
        }
    }
}
