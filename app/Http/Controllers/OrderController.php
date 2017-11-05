<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function sendOrder(Request $request)
	{
		$data = Order::validate($request);
		$request->flash();
		Order::send($data);
		
		$order = new Order();
		$result = $order->fill($data)->save() ? 'Ваша заявка принята' : 'Ошибка';
		return redirect()->back()->with('result', $result);
    }
}
