<?php

namespace App\Modules\Widgets\Services;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Order;

/**
 * Service Class
 *
 * @package default
 * @author
 **/
class WidgetsService
{
	/**
	 * Constructor Method - Injects all the necessary dependencies here
	 *
	 * @param
	 * @return void
	 * @author
	 **/
	public function __construct(){}

	// Widget router
	public function _widget($type)
	{
		switch($type){
			case 'customer': return $this->_widgetCustomer();
				break;
			case 'event': return $this->_widgetEvent();
				break;
			case 'order': return $this->_widgetOrder();
				break;
			default:
				return 0;
				break;
		}
	}

	// widget: customer info
	public function _widgetCustomer()
	{
		$count = Customer::count();
		return $count;
	}

	// widget: event info
	public function _widgetEvent()
	{
		$count = Event::count();
		return $count;
	}

	// widget: order info
	public function _widgetOrder()
	{
		$count = Order::count();
		return $count;
	}

} // END class