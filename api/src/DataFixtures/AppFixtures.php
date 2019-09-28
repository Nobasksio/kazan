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

        $train_array = [
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

    }
}
