<?php

namespace App\Modules\Weather\Services;
use App\Models\Weather;
use Illuminate\Support\Facades\DB;

/**
 * Service Class
 *
 * @package default
 * @author
 **/
class WeatherService
{
	/**
	 * Constructor Method - Injects all the necessary dependencies here
	 *
	 * @param
	 * @return void
	 * @author
	 **/
	public function __construct(){}

	// Record list
	public function _list() : object
	{
		return Weather::all();
	}

} // END class
