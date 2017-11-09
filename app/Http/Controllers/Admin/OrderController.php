<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
	public function index(Order $order)
	{
		$orders = $order->orderBy('id', 'desc')->select()->paginate(config('settings.orders_paginate'));
		$paginate = view('partials.paginate')->with('items', $orders)->render();
		return view('admin.orders')->with(['orders' => $orders, 'paginate' => $paginate]);
    }

	public function searchOrders(Request $request)
	{
		$query = $request->input('q');
		$validator = \Validator::make($request->all(), [
			'q' => 'required|max:255|string'
		]);
		if ($validator->fails()) {
			$orders = 'Некорректный запрос';
		} else {
			$orders = \DB::select("SELECT * FROM `orders` WHERE CONCAT(`num`, `name`)
								LIKE '%$query%' ORDER BY id DESC");
		}

		return view('admin.orders')->with('orders', $orders);
	}

	public function deleteOrder($order_id)
	{
		$order = Order::destroy($order_id);
		$result = $order ? 'Заявка удалена' : 'Ошибка';
		return redirect()->route('admin.orders')->with('result', $result);
    }

	public function addNote(Request $request, $order_id)
	{
		$order = Order::find($order_id);
		$order->note = $request->input('note');
		$result = $order->save() ? 'Заметка сохранена' : 'Ошибка';
		return redirect()->back()->with('result', $result);
    }
}
