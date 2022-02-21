<?php

namespace App\Modules\Widgets\Providers;

use App\Modules\Widgets\Services\WidgetsService;
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
		$this->app->bind('WidgetsService', function ($app) {
			return new WidgetsService();
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
