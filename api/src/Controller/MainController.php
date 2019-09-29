<?php

namespace App\Controller;

use App\Entity\Rest;
use App\Entity\TrainRoute;
use App\Repository\KitchenTypeRepository;
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


		$station_id = $request->request->get( 'station_id' );

		$rests = $restRepository->findAll();

		$len = count( $rests );

		$rest_arr = [];

		for ( $i = 0; $i < 5; $i ++ ) {
			$key = rand( 0, $len - 1 );

			$rest_arr[] = [
				'id'          => $rests['$key']->getId(),
				'name'        => $rests['$key']->getName(),
				'description' => $rests['$key']->getDescription(),
			];
		}

		$response = json_encode( [
			'rests' => $rest_arr
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

			try {
                $products_arr[] = [
                    'id' => $products['$key']->getId(),
                    'name' => $products['$key']->getName(),
                    'description' => $products['$key']->getDescription(),
                    'price' => $products['$key']->getPrice(),
                    'kitchen_type' => [
                        'id' => $products['$key']->getKitchenType()->getId(),
                        'name' => $products['$key']->getKitchenType()->getName(),
                    ],
                    'product_cat' => [
                        'id' => $products['$key']->getProductCat()->getId(),
                        'id' => $products['$key']->getProductCat()->getName(),
                    ],
                    'ves' => $products['$key']->getVes(),
                ];
            } catch (Exception $exception){

            }
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
			'trains'  => $train_result,
		] );

		return JsonResponse::fromJsonString( $response );

	}


	/**
	 * ("/api/train/list", name="rest_station2", methods={GET})
	 */
	public function train_route( Request $request, TrainRouteRepository $trainRouteRepository ) {

		$train_id = $request->request->get( 'train_id' );

		$routes = $trainRouteRepository->findBy(array('train' => $_GET['train_id']));

		$routes_result = [];

		foreach ( $routes as $item ) {
			$routes_result[] = [
				'id'   => $item->getId(),
				'train_id' => $item->getTrain()->getId(),
				'station_id' => $item->getStation()->getId(),
				'station_name' => $item->getStation()->getName(),
				'arrival_time' => $item->getArrivalTime(),
				'departure_time' => $item->getDepartureTime(),
			];
		}

		$response = json_encode( [
			'routes'  => $routes_result,
		] );

		return JsonResponse::fromJsonString( $response );

	}
}
