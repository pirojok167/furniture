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
		$request->flash();

		$contacts = Contact::first();

		$order = new Order();
		$result = $order->fill($data)->save() ? 'Ваша заявка принята' : false;
		if ($result) Order::send($data, $order->id, $contacts);

		return $result;
    }
}
