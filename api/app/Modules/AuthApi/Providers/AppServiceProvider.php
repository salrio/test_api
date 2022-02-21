<?php

namespace App\Modules\AuthApi\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\AuthApi\Services\AuthApiService;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 * Single or multiple binds
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('AuthApiService', function ($app) {
			return new AuthApiService();
		});
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
