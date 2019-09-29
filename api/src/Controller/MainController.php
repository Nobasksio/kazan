<?php

namespace App\Controller;

use App\Entity\OrderBasket;
use App\Entity\OrderEntity;
use App\Entity\Rest;
use App\Entity\TrainRoute;
use App\Repository\KitchenTypeRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductCatRepository;
use App\Repository\ProductRepository;
use App\Repository\RestRepository;
use App\Repository\StationRepository;
use App\Repository\TrainRepository;
use App\Repository\TrainRouteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {

	public function index(
		KitchenTypeRepository $kitchenTypeRepository,
		ProductCatRepository $productCatRepository
	) {

		$kitchen_types = $kitchenTypeRepository->findAll();

		$kitchen_types_arr = [];

		foreach ( $kitchen_types as $item ) {
			$kitchen_types_arr[] = [
				'id'   => $item->getId(),
				'name' => $item->getName(),
			];
		}

		$p_cats = $productCatRepository->findAll();


		$p_cats_arr = [];

		foreach ( $p_cats as $item ) {
			$p_cats_arr[] = [
				'id'   => $item->getId(),
				'name' => $item->getName(),
			];
		}

		$response = json_encode( [
			'product_cat'  => $p_cats_arr,
			'kitchen_type' => $kitchen_types_arr
		] );


		return JsonResponse::fromJsonString( $response );
	}

	/**
	 * ("/api/rest/list", name="rest_station", methods={GET})
	 */
	public function rest_list( RestRepository $restRepository, Request $request, StationRepository $stationRepository ) {

		$rests = $restRepository->findAll();

		$len = count( $rests );

		$rest_arr = [];

		$data = [
			[ 'id' => 1, 'name' => 'Sushi Studio',       'cats' => [ 1 ], 'stations' => [21] ],
			[ 'id' => 2, 'name' => 'Бургер кинг',        'cats' => [ 3 ], 'stations' => [21] ],
			[ 'id' => 3, 'name' => 'KFC',                'cats' => [ 3 ], 'stations' => [21] ],
			[ 'id' => 4, 'name' => 'DODO pizza',         'cats' => [ 2 ], 'stations' => [21] ],
			[ 'id' => 5, 'name' => 'Чайхана №1',         'cats' => [ 7 ], 'stations' => [21] ],
			[ 'id' => 6, 'name' => 'Zuma',               'cats' => [ 7 ], 'stations' => [21] ],
			[ 'id' => 7, 'name' => 'Black Star Burgers', 'cats' => [ 3 ], 'stations' => [21] ],
			[ 'id' => 8, 'name' => 'Фарш',               'cats' => [ 6 ], 'stations' => [21] ],
			[ 'id' => 9, 'name' => 'Антрекот',           'cats' => [ 6, 3 ], 'stations' => [21] ],
			[ 'id' => 10, 'name' => 'Антрекот Ангарск',   'cats' => [ 6, 3 ], 'stations' => [22] ],
		];

		$response = json_encode( [
			'rests' => $data
		] );

		return JsonResponse::fromJsonString( $response );
	}

	/**
	 * ("/api/rest/{id}/load", name="rest_single", methods={GET})
	 */
	public function rest_load( Rest $rest, ProductRepository $productRepository ) {

		$products = $productRepository->findAll();

		$len      = count( $products );
		$len_resp = rand( 3, 6 );


		for ( $i = 0; $i < $len_resp; $i ++ ) {

			$key = rand( 0, $len - 1 );

			if (!array_key_exists($key, $products)) continue;

			if ($products[$key]->getKitchenType()){
			    $kt_id = $products[$key]->getKitchenType()->getId();
                $kt_name = $products[$key]->getKitchenType()->getName();
            } else {
                $kt_id = null;
                $kt_name = null;
            }

            if ($products[$key]->getProductCat()){
                $ct_id = $products[$key]->getProductCat()->getId();
                $ct_name = $products[$key]->getProductCat()->getName();
            } else {
                $ct_id = null;
                $ct_name = null;
            }
			$products_arr[] = [
				'id'           => $products[$key]->getId(),
				'name'         => $products[$key]->getName(),
				'description'  => $products[$key]->getDescription(),
				'price'        => $products[$key]->getPrice(),
				'kitchen_type' => [
					'id'   => $kt_id,
					'name' => $kt_name,
				],
				'product_cat'  => [
					'id' => $ct_id,
					'name' => $ct_name
				],
				'ves'          => $products[$key]->getVes(),
			];
		}

		$rest_arr = [
			'id'          => $rest->getId(),
			'name'        => $rest->getName(),
			'description' => $rest->getDescription(),
		];

		$response = json_encode( [
			'rest'     => $rest_arr,
			'products' => $products_arr
		] );

		return JsonResponse::fromJsonString( $response );

	}


	/**
	 * ("/api/train/list", name="train_station", methods={GET})
	 */
	public function train_list( TrainRepository $trainRepository ) {

		$trains = $trainRepository->findAll();

		$train_result = [];

		foreach ( $trains as $item ) {
			$train_result[] = [
				'id'   => $item->getId(),
				'name' => $item->getName(),
			];
		}

		$response = json_encode( [
			'trains' => $train_result,
		] );

		return JsonResponse::fromJsonString( $response );

	}


	/**
	 * ("/api/train/list", name="rest_station2", methods={GET})
	 */
	public function train_route( Request $request, TrainRouteRepository $trainRouteRepository ) {

		$train_id = $request->request->get( 'train_id' );

		$routes = $trainRouteRepository->findBy( array( 'train' => $_GET['train_id'] ) );

		$routes_result = [];

		foreach ( $routes as $item ) {
			$routes_result[] = [
				'id'             => $item->getId(),
				'train_id'       => $item->getTrain()->getId(),
				'station_id'     => $item->getStation()->getId(),
				'station_name'   => $item->getStation()->getName(),
				'arrival_time'   => $item->getArrivalTime(),
				'departure_time' => $item->getDepartureTime(),
			];
		}

		$response = json_encode( [
			'routes' => $routes_result,
		] );

		return JsonResponse::fromJsonString( $response );

	}
    public function confirm( Request $request,
                             StationRepository $stationRepository,
                             RestRepository $restRepository) {
        $order_info = $request->request->get('order');


        $order_info = json_decode(json_encode(json_decode($order_info)), true);


        $order = new OrderEntity();

        $rest = $restRepository->findOneBy(['id'=>$order_info['rest_id']]);

        $station = $stationRepository->findOneBy(['id'=>1]);
        $order->setStation($station);

        $order->setRest($rest);
        $order->setPhone($order_info['phone']);
        $order->setTrainId($order_info['train_route_id']);
        $order->setDeliveryTime($order_info['delivery_time']);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($order);


        $entityManager->flush();
        foreach ($order_info['basket'] as $basket_item){
            $basket = new OrderBasket();

            $basket->setOrderEntity($order);

            $basket->setProductId($basket_item['product_id']);
            $basket->setQuantity($basket_item['quantity']);

            $entityManager->persist($basket);
        }

        $entityManager->flush();

    }

    public function order(OrderEntity $orderEntity, Request $request,
                             StationRepository $stationRepository,
                             ProductRepository $productRepository,
                             RestRepository $restRepository) {


        $order_baskets = $orderEntity->getOrderBaskets();

        $product_arr = [];
        foreach ($order_baskets as $basket_item){
            $product = $productRepository->findOneBy(['id'=>$basket_item->getProductId()]);
            if ($product) {
                $product_arr[] = ['name' => $product->getName(),
                    'id'=>$product->getId(),
                    'quantity'=>$basket_item->getQuantity()
                ];
                }
        }
        $array_order = [
            'id' => $orderEntity->getId(),
            'phone' => $orderEntity->getPhone(),
            'delivery_time' => $orderEntity->getDeliveryTime(),
            'rest_id' => $orderEntity->getRest()->getId(),
            'products' =>$product_arr,
            'id' => $orderEntity->getId(),
            ];

        $response = json_encode( [
            'order' => $array_order,
        ] );

        return JsonResponse::fromJsonString( $response );
    }

    public function orders(Request $request,
                          OrderRepository $orderRepository,
                          StationRepository $stationRepository,
                          ProductRepository $productRepository,
                          RestRepository $restRepository) {


        $orders = $orderRepository->findAll();

        $arr_orders = [];

        foreach ($orders as $orderEntity) {
            $order_baskets = $orderEntity->get();

            $product_arr = [];
            foreach ($order_baskets as $basket_item) {
                $product = $productRepository->findOneBy(['id' => $basket_item->getProductId()]);
                if ($product) {
                    $product_arr[] = ['name' => $product->getName(),
                        'id' => $product->getId(),
                        'quantity' => $basket_item->getQuantity()
                    ];
                }
            }
            $array_order = [
                'id' => $orderEntity->getId(),
                'phone' => $orderEntity->getPhone(),
                'delivery_time' => $orderEntity->getDeliveryTime(),
                'rest_id' => $orderEntity->getRest()->getId(),
                'products' => $product_arr,
            ];

            $arr_orders[] = $array_order;
        }

        $response = json_encode( [
            'orders' => $arr_orders,
        ] );

        return JsonResponse::fromJsonString( $response );
    }

}
