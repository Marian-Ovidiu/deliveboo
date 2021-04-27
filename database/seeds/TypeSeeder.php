<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Business;

class TypeSeeder extends Seeder
{

  public $typesList = [
          'Italiano',
          'Pesce',
          'Carne',
          'Pizza',
          'Sandwiches',
          'Vegetariano',
          'Cinese',
          'Sushi',
          'Etnico',
          'Spagnolo',
          'Sud Americano',
          'Pasticcerìa'
      ];

  public $imgsList = [
    'img/00-type-ita.jpg',
    'img/00-type-fish.jpg',
    'img/00-type-steak.jpg',
    'img/00-type-pizza.jpg',
    'img/00-type-sandwich.jpg',
    'img/00-type-vegetarian.jpg',
    'img/00-type-chinese.jpg',
    'img/00-type-sushi.jpg',
    'img/00-type-etnic.jpg',
    'img/00-type-spanish.jpg',
    'img/00-type-southam.jpg',
    'img/00-type-cakes.jpg'
      ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < count($this->typesList); $i++){
            $type = New Type();
            $type->name = $this->typesList[$i];
            $type->img = $this->imgsList[$i];
            $type->save();
        }

        $businesses = Business::all();
        $types = Type::all();

        foreach($businesses as $business){
            $indexes = $this->uniqueIds(0, 11, rand(1, 3));
            for ($y = 0; $y < count($indexes); $y++) {
                $business->types()->save($types[$indexes[$y]]);
            }
        }
    }

    public function uniqueIds($min, $max, $quantity) {
        for ($z = 0; $z < $quantity; $z++) {
            $numbers = range($min, $max);
            shuffle($numbers);
        }
        return array_slice($numbers, 0, $quantity);
    }

    // Funzione di assegnazione id univoco relativo a Types
    // public function uniqueId($min, $max, $nums) {
    //     $num = rand($min, $max);
    //     if(!in_array($num, $nums)) {
    //       $nums[] = $num;
    //     }
    //     return $num;
    // }
}
