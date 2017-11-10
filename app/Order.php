<?php

namespace App;

use App\Mail\OrderShipped;
use App\Mail\OrderShippedToAdmin;
use App\Mail\OrderShippedToClient;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'comment'];

	public static function validate($request)
	{
		$data = $request->except('_token');

		$validator = \Validator::make($data, [
			'name' => 'string|max:255|required',
			'phone' => 'string|max:255|required',
			'email' => 'email|required',
			'comment' => 'string|max:300'
		]);

		if ($validator->fails()) {
			return json_encode($validator->errors());
		}
		return $data;
    }

	public static function send($user_data, $order_id, $contacts)
	{
		$admin = Contact::first();

		$result_1 = \Mail::to($admin->email)->send(new OrderShippedToAdmin($user_data, $admin->email, $order_id));
		$result_2 = \Mail::to($user_data['email'])
			->send(new OrderShippedToClient($user_data, $admin->email, $contacts));

		if ($result_1 && $result_2)	return true;
		return false;
    }
}
