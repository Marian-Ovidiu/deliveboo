<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Business;

class TypeSeeder extends Seeder
{

  public $typesList = [
          'Italiano',
          'Etnico',
          'Cinese',
          'Giapponese',
          'Vegano',
          'Indiano',
          'Messicano',
          'Pizza',
          'Panini',
          'Carne',
          'Sushi',
          'Dolci'
      ];

  public $imgsList = [
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Italiano',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/kebab',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Cinese',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Giapponese',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Vegano',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Indiano',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Messicano',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/pizza',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/panini',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/argentino',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Sushi',
          'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,d_cms:wallpaper:fallback_4.jpg,h_151,w_387/c_fill,g_auto,f_auto,q_auto,dpr_2.0/v1/it/cuisine-icons/Dolci'
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
        $num = rand ($min, $max);
        if(!in_array($num, $nums)) {
          $nums[] = $num;
        }
        return $num;
      }
}
