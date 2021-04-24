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
            $indexes = [];
            for($i = 0; $i < rand(1, 3); $i++){
              $business->types()->save($types[$this->uniqueId(0, 11, $indexes)]);
            }
        }
    }

    // Funzione di assegnazione id univoco relativo a Types
    public function uniqueId($min, $max, $nums) {
        $num = rand($min, $max);
        if(!in_array($num, $nums)) {
          $nums[] = $num;
        }
        return $num;
    }
}
