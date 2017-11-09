<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function sendOrder(Request $request)
	{
		$data = Order::validate($request);
		$contacts = Contact::first();

		$num = mt_rand(1111,9999);

		$order = new Order();
		$order->num = $this->setNum($num);
		$result = $order->fill($data)->save() ? 'Ваша заявка принята' : false;
		if ($result) Order::send($data, $order->id, $contacts);

		return $result;
    }

	public function setNum($num)
	{
		$orders = Order::where('num', $num)->get();
		if (!$orders->isEmpty()) {
			$number = mt_rand(1111,9999);
			$this->setNum($number);
		} else return $num;
    }
}
