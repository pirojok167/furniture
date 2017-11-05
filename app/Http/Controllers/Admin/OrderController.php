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
