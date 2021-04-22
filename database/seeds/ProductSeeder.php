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

        $products = [
            [
                'name' => 'Carciofi e patate in padella',
                'ingredients' => 'carciofi, patate, aglio, prezzemolo, olio extravergine di oliva, pepe',
                'description' => 'I carciofi e patate in padella portano in tavola un contorno tanto semplice quanto gustoso che promette di piacere proprio a tutti',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3tTJSDb',
                'visible' => 1

            ],
            [
                'name' => 'Tortellini alla panna',
                'ingredients' => 'tortellini, panna fresca, olio di oliva, noce moscata, pepe nero, parmigiano grattugiato',
                'description' => 'Piatto molto goloso, che piace a grandi e piccini',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3enxWTp',
                'visible' => 1

            ],
            [
                'name' => 'Ravioli di burrata',
                'ingredients' => 'burrata, ricotta, uova, pepe, pomodorini, aglio, basilico',
                'description' => 'I ravioli di burrata portano in tavola un primo piatto di pasta ripiena davvero goloso e sfizioso',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3sGZhVZ',
                'visible' => 1

            ],
            [
                'name' => 'Tagliolini al tartufo',
                'ingredients' => 'rartufo nero, aglio, burro, uova, olio d\'oliva',
                'description' => 'I tagliolini al tartufo fresco esaltano due ingredienti eccezionali: il tagliolini fatti in casa e il tartufo nero fresco',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3eiB570',
                'visible' => 1

            ],
            [
                'name' => 'Spaghetti con pesce e zucchine',
                'ingredients' => 'spaghetti, zucchine, gamberi, merluzzo, pesce spada, cipolla, aglio, vino bianco, olio d\'oliva, erbe aromatiche, pepe',
                'description' => 'Gli spaghetti con pesce e zucchine presentano una combinazione “mare e monti” per nulla scontata: gamberi, merluzzo, pesce spada e zucchine',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3avN4wY',
                'visible' => 1

            ],
            [
                'name' => 'Lasagne ai frutti di mare',
                'ingredients' => 'cozze, vongole, gamberi, canocchie, lasagne, pomodori, cipolla, aglio, vino bianco, prezzemolo, peperoncino, olio d\'oliva',
                'description' => 'Le lasagne ai frutti di mare sono un primo davvero raffinato che unisce la tradizione delle lasagne all’amore per i frutti di mare e il pesce',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/2RVYyn5',
                'visible' => 1

            ],
            [
                'name' => 'Pasta al granchio e pomodorini',
                'ingredients' => 'granchio, pomodorini, cipolla, aglio, vino bianco, prezzemolo, olio d\'oliva, pepe',
                'description' => 'La pasta al granchio e pomodorini è uno di quei primi piatti a base di mare dall’odore inebriante e dal sapore inconfondibile',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3asq7dR',
                'visible' => 1

            ],
            [
                'name' => 'Casoncelli alla bresciana',
                'ingredients' => 'uova, pane grattuggiato, formaggio, brodo di carne, aglio, prezzemolo, noce moscata, pepe, buro, salvia',
                'description' => 'I casoncelli alla bresciana portano in tavola un tipico piatto lombardo nella variante tipica di Brescia.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/32DnKRm',
                'visible' => 1

            ],
            [
                'name' => 'Pasta salsiccia e funghi',
                'ingredients' => 'funghi, salsiccia di maiale, panna fresca, aglio, vino bianco, prezzemolo, olio d\'oliva, pepe',
                'description' => 'La pasta salsiccia e funghi è un primo piatto semplice da realizzare, ma che nasconde un gusto pieno e inconfondibile.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3vbIvzE',
                'visible' => 1

            ],
            [
                'name' => 'Calamarata ai frutti di mare',
                'ingredients' => 'calamari, cozze, vongole, telline, gamberoni, pomodorini, aglio, prezzemolo, peperoncino, olio d\'oliva',
                'description' => 'La calamarata ai frutti di mare è uno di quei primi piatti che porta tutta la ricchezza del sapore e del profumo del mare in tavola.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://media.cucinarefacile.com/wp-content/uploads/2020/10/10093032/calamarata-ai-frutti-di-mare.jpg',
                'visible' => 1

            ],
            // 10
            [
                'name' => 'Wanton fritti',
                'ingredients' => 'macinato di maiale, gamberi, cipollotti, zenzero, aceto di riso, salsa di soia, amido di mais, olio di semi',
                'description' => 'I wanton fritti o wonton nella versione italianizzata, sono dei fagottini ripieni di origine cinese che hanno conquistato gli amanti della cucina orientale',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/2PeAZ80',
                'visible' => 1

            ],
            [
                'name' => 'Torta Arcobaleno o Rainbow Cake',
                'ingredients' => 'burro, latte, zucchero, lievito per dolci, estratto di vaniglia, coloranti alimentari, mascarpone, zucchero a velo',
                'description' => 'Allegra e coloratissima, la torta Arcobaleno è un dolce scenografico ideale per rallegrare ogni occasione.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3grGcEF',
                'visible' => 1

            ],
            [
                'name' => 'Ciambella classica',
                'ingredients' => 'uova, zucchero, latte, limone, olio, lievito per dolci',
                'description' => 'La ciambella classica è uno dei dolci più classici preparato in casa, quello che riporta la mente alle merende da bambini e alla spensieratezza di quei tempi.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3eoz3SJ',
                'visible' => 1

            ],
            [
                'name' => 'Risotto pere e gorgonzola',
                'ingredients' => 'riso, gorgonzola, pere, vino bianco, scalogno, brodo vegetale, formaggio, olio extravergine d\'oliva, pepe',
                'description' => 'Chi lo dice che un piatto vegetariano non possa sposare il sapore? Il risotto pere e gorgonzola è l’esempio lampante di come la cucina vegetariana unisca gusto e raffinatezza.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3guVjgp',
                'visible' => 1

            ],
            [
                'name' => 'Polpette di broccoli al forno',
                'ingredients' => 'broccoli, uova, aglio, formaggio, basilico, pane grattuggiato',
                'description' => 'Le polpette di broccoli al forno portano in tavola un secondo o un finger food vegetariano alternativo alle classiche polpette di carne.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3gAdWzF',
                'visible' => 1

            ],
            [
                'name' => 'Frittelle di mais',
                'ingredients' => 'mais precotto a vapore, uova, latte, formaggio, basilico, pepe, olio di semi',
                'description' => 'Le frittelle di mais portano in tavola un antipasto delizioso che supera i preconcetti legati alla dieta vegetariana.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3au0yJq',
                'visible' => 1

            ],
            [
                'name' => 'Torta al cioccolato fondente e Panna Meggle',
                'ingredients' => 'latte, burro fiore bavarese meggle, zucchero, cacao amaro, lievito per dolci, cioccolato fondente',
                'description' => 'Torta morbida al cioccolato fondente e Panna Meggle, una ricetta senza uova, soffice e golosa.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/2Qp3i3Z',
                'visible' => 1

            ],
            [
                'name' => 'Pancake con frutta e Burro Tradizionale Fiore Bavarese',
                'ingredients' => 'burro fiore bavarese meggle, lievito per dolci, uova, latte, zucchero',
                'description' => 'I pancake, soffici e golose frittelle dalla consistenza spugnosa e dal gusto saporito.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3tJ3vNU',
                'visible' => 1

            ],
            [
                'name' => 'Arancinette con piselli, mozzarella e Dado allo Zafferano',
                'ingredients' => 'riso, burro, parmiggiano, dado allo zafferano, piselli, mozzarella, cipolla, besciamella, latte, zafferano',
                'description' => 'Piatto che richiama la Sicilia con note speziate allo zafferano.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3neW26P',
                'visible' => 1

            ],
            [
                'name' => 'Zuppa di cavolo nero e patate',
                'ingredients' => 'cavolo nero, patate, aglio, scalogno, passata di pomodoro, peperoncino, olio extravergine d\'oliva, pane tostato',
                'description' => 'La zuppa di cavolo nero e patate è un piatto semplice che ben si presta ai mesi più freddi.',
                'price' => $faker->randomFloat(2, 6, 20),
                'img' => 'https://bit.ly/3vfxUE7',
                'visible' => 1

            ],
        ];

        foreach($businesses as $key => $b){
            for($i = 1; $i < rand(4, 8); $i++){
                $randomProductIdx = rand(0, 19);
                $product = new Product();
                $product->name = $products[$randomProductIdx]['name'];
                $product->ingredients = $products[$randomProductIdx]['ingredients'];
                $product->description = $products[$randomProductIdx]['description'];
                $product->price = $products[$randomProductIdx]['price'];
                $product->img = $products[$randomProductIdx]['img'];
                $product->visible = 1;
                $product->business_id = $key + 1;
                $product->save();
            }
        }

    }
}
