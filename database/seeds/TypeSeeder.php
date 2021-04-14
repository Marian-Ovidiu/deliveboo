<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Business;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
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

        $imgs = [
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


        for($i = 0; $i < count($types); $i++){

            $newType = New Type();
            $newType->name = $types[$i];
            $newType->img = $imgs[$i];

            $newType->save();

        }

        $businesses = Business::all();
        $allTypes = Type::all();

        foreach($businesses as $business){
          $nums = [];
            for($i = 0; $i < rand(1, 3); $i++){
              $business->types()->save($allTypes[$this->uniqueId(1, 12, $nums)]);
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
