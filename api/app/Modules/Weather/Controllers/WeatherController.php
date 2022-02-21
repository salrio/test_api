<?php

namespace App\Modules\Weather\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psr\Container\ContainerInterface;
use GuzzleHttp\Client;

class WeatherController extends Controller
{

	private $service;
	// private $anotherService;

	public function __construct(ContainerInterface $container)
	{
		$this->service = $container->get('WeatherService');
	}

	/**
	 * Executes this command upon calling this controller
	 *
	 * @return void
	 * @author
	 **/

	// List
	public function __invoke(Request $request){
		$list = $this->service->_list();
		$cities = array();

		foreach( $list AS $city ){
			$cityName = $city->city;
			$weather = $this->getWeather($cityName);
			$placeId = $this->getPlaceId($weather['coord']);
			$placeInfo = $this->getPlaceInfo($placeId);
			$placePhoto = $this->getPhoto($placeId);

			$cities[] = [
				'cityName' => $cityName,
				'description' => $city->description,
				'weather' => $weather,
				'locality' => $placeInfo['locality'],
				'postcode' => $placeInfo['postcode'],
				'region' => $placeInfo['region'],
				'placePhoto' => $placePhoto,
				'weatherIcon' => "http://openweathermap.org/img/w/" . $weather['weather'][0]['icon'] . ".png",
			];
		}

		return response([
			'data' => $cities
		], 200);
	}

	public function getWeather($city){
		$app_id = "a6c7398db15ad068507c22d34f301ccd";
		$url = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$app_id;
		$result = $this->grequest($url);

		return $result;
	}

	public function getPlaceId($coordinates){
		$lat = $coordinates['lat'];
		$lon = $coordinates['lon'];
		$url = "https://api.foursquare.com/v3/places/search?ll=".$lat."%2C".$lon."&limit=1";
		$result = $this->grequest($url,true);

		return $result['results'][0]['fsq_id'];
	}

	public function getPlaceInfo($placeId){
		$url = "https://api.foursquare.com/v3/places/".$placeId;
		$result = $this->grequest($url,true);

		return $result['location'];
	}

	public function getPhoto($placeId){
		$url = "https://api.foursquare.com/v3/places/".$placeId."/photos?limit=1";
		$result = $this->grequest($url,true);

		if($result){
			return $result[0]['prefix']."width".$result[0]['width']."".$result[0]['suffix'];
		}
		return '';
	}

	public function getHeaders($hasAuth=false){
		$headers = [
			'Accept' => 'application/json'
		];

		if($hasAuth){
			$headers['Authorization'] = 'fsq3iUfd5G/vRykC+fPaUFnlB7L6DT2TVPmofR9kJuz0/rY=';
		}

		return ['headers' => $headers];
	}

	public function grequest($url, $hasAuth=false){
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', $url, $this->getHeaders($hasAuth));

		return json_decode($response->getBody(), true);
	}

	public function getVenues(Request $request, $city){
		$list = $this->service->_list();

		return response([
			'data' => $list
		], 200);
	}

}
