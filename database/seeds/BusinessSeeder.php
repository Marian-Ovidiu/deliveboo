<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Business;
use App\User;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
    *
    * @return void
    */
    public function run(Faker $faker) {

        $users = User::all();

        $closingDays = [
            'Domenica',
            'Sabato',
            'Venerdì',
            'Giovedì',
            'Mercoledì',
            'Martedì',
            'Lunedì'
        ];

        $data = [
            [
                'name' => 'Ristorane Cinese DI Sichuan',
                'description' => 'Piatti buoni e di qualità, con grande varietà di portate che spaziano dai classici alle ricette tradizionali della regione di Sichuan. Qui si respira la vera aria del tipico ristorante cinese.',
                'address' => "Via Goffredo 5, 00153 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/01-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Rosemary Terra e Sapori',
                'description' => 'Locale ben arredato, atmosfera accogliente e cibo di ottima qualità, tutto km 0 e bio.',
                'address' => "Via Daniele Samarate 24, 00125 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/02-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Domò Sushi',
                'description' => 'Un luogo accogliente, elegante, ben arredato e luminoso, con possibilità di mangiare anche all\'aperto. Sushi fantastico, ad alta digeribilità.',
                'address' => "Via Bellinzona 11, 00198 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/03-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Himalaya\'s Kashmir',
                'description' => 'Immergersi nelle atmosfere e nei sapori indiani non è stato mai così semplice, ambiente caldo e familiare, ottima cucina.',
                'address' => "Via Cipro 4L, 00136 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/04-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Osteria Maré',
                'description' => 'Consegna a domicilio, servizio veloce e gentile. Bancone a vista con tutte le etichette dei vini presenti, qualità del cibo nettamente sopra la media',
                'address' => "Borgo Pio 21, 00193 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/05-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Team#5 - Boolean Reastaurant',
                'description' => 'Lasciatevi prendere per mano dal Team #5 della classe #25 di Boolean che vi accompagneranno in un viaggio fatto di selezione accurata dei fornitori, di scelta oculata dei prodotti da offrire e di attenzione al cliente.',
                'address' => $faker->address(),
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/06-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Lime Restaurant & Bar',
                'description' => 'Una frizzante selezione di cocktails e appetitose leccornìe, che ti condurranno in un aperitivo da sogno.',
                'address' => "Piazzale Milvio 3, 00135 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/07-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Osteria da Noiartri',
                'description' => 'Cucina a base di pesce ottima, servizio accogliente e preciso nella cura dei dettagli.',
                'address' => "Via Metastasio 21, 00186 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/08-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'PaninoLAB Tortona District',
                'description' => 'Ingredienti di qualità eccellente, accostamenti gustosi, quando il panino non è un semplice panino ma un insieme di sapori sapientemente accostati',
                'address' => "Via della Pelliccia 29A, 00153 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/09-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
            [
                'name' => 'Al Padellone',
                'description' => 'Stile steak house dallo spirito Industrial, carne ottima e ben accompagnata da buoni contorni.',
                'address' => "Via del Paradiso 39, 00186 Roma",
                'closing_day' => $faker->randomElement($closingDays),
                'opening_time' => $faker->time,
                'closing_time' => $faker->time,
                'logo' => 'img/10-rest.jpg',
                'telephone' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail(),
                'website' => $faker->url(),
            ],
        ];

        foreach ($users as $key => $user) {

            $business = new Business();
            $business->name = $data[$key]['name'];
            $business->description = $data[$key]['description'];
            $business->address = $data[$key]['address'];
            $business->closing_day = $data[$key]['closing_day'];
            $business->opening_time = $data[$key]['opening_time'];
            $business->closing_time = $data[$key]['closing_time'];
            $business->logo = $data[$key]['logo'];
            $business->telephone = $data[$key]['telephone'];
            $business->email = $data[$key]['email'];
            $business->website = $data[$key]['website'];
            $user->business()->save($business);

        }
    }
}
