<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Business;
use App\Product;
use App\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BusinessSeeder::class,
            ProductSeeder::class,
            TypeSeeder::class,
        ]);
    }
}
