<?php

namespace App\Modules\Weather\Providers;

use App\Modules\Weather\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 * Single or multiple binds
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('WeatherService', function ($app) {
			return new WeatherService();
		});		

		// $this->app->bind( 'AnotherService', function( $app ){
		//     return new AnotherService();
		// });
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
	}
}
