<?php

namespace App\Modules\Widgets\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psr\Container\ContainerInterface;
use Illuminate\Support\Facades\File; 

class WidgetsController extends Controller
{

	private $service;
	// private $anotherService;

	public function __construct(ContainerInterface $container)
	{
		$this->service = $container->get('WidgetsService');
	}

	/**
	 * Executes this command upon calling this controller
	 *
	 * @return void
	 * @author
	 **/

	// List
	public function __invoke(Request $request){

		$type = $request->validate([
			'type' => 'required|string|min:1|max:15'
		]);
		
		$count = $this->service->_widget($type['type']);

		return response([
			'count' => $count
		], 200);
	}
}
