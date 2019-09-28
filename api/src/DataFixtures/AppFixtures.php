<?php

namespace App\DataFixtures;

use App\Entity\KitchenType;
use App\Entity\OrderStatus;
use App\Entity\Product;
use App\Entity\ProductCat;
use App\Entity\Rest;
use App\Entity\Station;
use App\Entity\Train;
use App\Entity\TrainRoute;
use App\Repository\KitchenTypeRepository;
use App\Repository\ProductCatRepository;
use App\Repository\RestRepository;
use App\Repository\StationRepository;
use App\Repository\TrainRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public $ktr;
    public $trainRepository;
    public $strepository;
    public $pcr;
    public $restRepository;

    public function __construct( KitchenTypeRepository $ktr,
                                 TrainRepository $trainRepository,
                                 StationRepository $strepository,
                                 ProductCatRepository $pcr,
                                 RestRepository $restRepository) {

        $this->ktr = $ktr;
        $this->trainRepository = $trainRepository;
        $this->strepository = $strepository;
        $this->pcr = $pcr;
        $this->restRepository = $restRepository;

    }

    public function load(ObjectManager $manager)
    {
        $array_k_type = [
             'Суши', 'Бургеры', 'Пицца','Здоровая', 'Веганская','Шашлыки', 'Стейки'
        ];

        foreach ($array_k_type as $item){
            $kitchen_type = new KitchenType();
            $kitchen_type->setName($item);

            $manager->persist($kitchen_type);
        }

        $product_cat_array= [
            'Горячее', 'Суши', 'Роллы','Десерты', 'Салаты','Стейки', 'Супы','Пицца','Напитки'
        ];

        foreach ($product_cat_array as $item){
            $product_cat = new ProductCat();
            $product_cat->setName($item);

            $manager->persist($product_cat);
        }

        $rest_array= [
            'Sushi Studio', 'Бургер кинг', 'KFC','DODO pizza', 'Чайхана №1','Zuma', 'Black Star Burgers','Фарш','Антрекот'
        ];

        foreach ($rest_array as $item){
            $rest = new Rest();
            $rest->setName($item);

            $manager->persist($rest);
        }

        $status_array= [
            'Оформлен', 'Принят', 'Исполнен','Отменен'
        ];

        foreach ($status_array as $item){
            $status = new OrderStatus();
            $status->setName($item);

            $manager->persist($status);
        }

        $train_array= [
            'Иркутск - Москва', 'Иркутск - Владивосток'
        ];

        foreach ($train_array as $item){
            $train = new Train();
            $train->setName($item);

            $manager->persist($train);
        }



        $station_array = [
            'Иркут Сорт',
            'Ангарск',
            'Усол Сибир',
            'Черемхово',
            'Кутулик',
            'Залари',
            'Зима',
            'Куйтун',
            'Тулун',
            'Нижнеудинс',
            'Алзамай',
            'Тайшет',
            'Решоты',
            'Иланская',
            'Канск Енис',
            'Красноярск',
            'Новосибирс',
            'Тюмень',
            'Казань',
            'Москва',
        ];

        foreach ($station_array as $item){
            $station = new Station();
            $station->setName($item);

            $manager->persist($station);
        }

        $manager->flush();

        $train = $this->trainRepository->findOneBy(['name'=>'Иркутск - Москва']);



        $this_mt = 1569705921;



        foreach ($station_array as $item_station){
            $station = $this->strepository->findOneBy(['name'=>$item_station]);

            $train_route = new TrainRoute();

            $rand_time = rand(60*30,60*180);

            $this_mt = $this_mt + $rand_time;

            $train_route->setTrain($train);

            $train_route->setStation($station);

            $train_route->setArrivalTime($this_mt);

            $train_route->setDepartureTime($this_mt + 30);

            $manager->persist($train_route);

        }

        $station_array2 = [
            'Иркутск пасс',
            'Улан Удэ',
            'Чита',
            'Сковородин',
            'Белогорск',
            'Облучье',
            'Хабаровск',
            'Лучегорск',
            'Ружино',
            'Уссурийск',
            'Владивосток'
        ];

        $train2 = $this->trainRepository->findOneBy(['name'=>'Иркутск - Владивосток']);


        foreach ($station_array2 as $item){
            $station = new Station();
            $station->setName($item);

            $manager->persist($station);

            $manager->flush();

            $train_route = new TrainRoute();

            $rand_time = rand(60*30,60*180);

            $this_mt = $this_mt + $rand_time;

            $train_route->setTrain($train2);

            $train_route->setStation($station);

            $train_route->setArrivalTime($this_mt);

            $train_route->setDepartureTime($this_mt + 30);

            $manager->persist($train_route);

        }

        $manager->flush();



        $product_array2 = [
            ['name'=>'Филадельфия лайт',
                'price'=>320,
                'description' => 'Семга, сливочный сыр, трюфель, луковые чипсы, соус «Терияки» ',
                'ves'=> 280,
                'cat' => 'Роллы'
                ],
            ['name'=>'Сяке маки',
                'price'=>220,
                'description' => 'Сёмга, огурец.',
                'ves'=> 180,
                'cat' => 'Роллы'
            ],
            ['name'=>'Пицца пеперони',
                'price'=>520,
                'description' => 'Пицца соус, сыр моцарелла, грибы шампиньоны, колбаса пепперони сырокопченая ',
                'ves'=> 880,
                'cat' => 'Пицца'
            ],
            ['name'=>'Пицца маргарита',
                'price'=>720,
                'description' => 'Пицца соус, сыр Моцарелла, жульен, куриная грудка, лук зеленый. ',
                'ves'=> 980,
                'cat' => 'Пицца'
            ],
            ['name'=>'Рамен',
                'price'=>280,
                'description' => 'Пицца соус, сыр Моцарелла, жульен, куриная грудка, лук зеленый.',
                'ves'=> 550,
                'cat' => 'Супы'
            ],
            ['name'=>'Том ям',
                'price'=>390,
                'description' => 'Креветка, кальмар, курица, кокосовое молоко, помидоры черри, грибы шиитаке, лемонграсс, имбирь, перец чили, лайм,кинза',
                'ves'=> 380,
                'cat' => 'Супы'
            ],
            ['name'=>'Эби темпура',
                'price'=>340,
                'description' => 'Креветки в темпуре, миндаль, кунжут, соус "Терияки"',
                'ves'=> 150,
                'cat' => 'Горячее'
            ],
            ['name'=>'Ояко дон',
                'price'=>320,
                'description' => 'Курица, шампиньоны, яйцо, рис, соус "Ояко дон", соус "Терияки',
                'ves'=> 280,
                'cat' => 'Горячее'
            ],
            ['name'=>'Цезарь Тори',
                'price'=>220,
                'description' => 'Копчёная курица, лист салата, сыр “Пармезан”, хрустящие чипсы, помидоры черри, соус “Цезарь”.',
                'ves'=> 200,
                'cat' => 'Салаты'
            ],
            ['name'=>'Фунчоза со свининой ',
                'price'=>195,
                'description' => 'Тонкая фунчоза, морковь, огурец, свинина в соусе “Креветочный чили”, лист салата, кунжут ',
                'ves'=> 170,
                'cat' => 'Салаты'
            ],
            ['name'=>'Шокомания',
                'price'=>280,
                'description' => 'Шоколад, сливочный сыр, соус "Маракуйя", миндаль',
                'ves'=> 200,
                'cat' => 'Десерты'
            ],
            ['name'=>'Маффин "Зеленый чай" ',
                'price'=>190,
                'description' => 'Бисквит "Зелёный чай", манго, соус "Сливочно-шоколадный"',
                'ves'=> 180,
                'cat' => 'Десерты'
            ],
        ];


        foreach ($product_array2 as $item){
             $prodcut = new Product();
            $prodcut->setName($item['name']);
            $prodcut->setPrice($item['price']);
            $prodcut->setDescription($item['description']);
            $prodcut->setVes($item['ves']);

            $product_cat = $this->pcr->findOneBy(['name'=>$item['cat']]);

            $prodcut->setProductCat($product_cat);

            $manager->persist($prodcut);
        }

        $manager->flush();


    }
}
