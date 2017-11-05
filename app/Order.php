<?php

namespace App;

use App\Mail\OrderShipped;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'comment'];

	public static function validate($request)
	{
		$data = $request->except('_token');

		$validator = \Validator::make($data, [
			'name' => 'string|max:255|required',
			'phone' => 'numeric|required',
			'email' => 'email|required',
			'comment' => 'string|max:400'
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}
		return $data;
    }

	public static function send($user_data)
	{
		$admin = Contact::select()->first();

		$result_1 = \Mail::to('pirojok167@gmail.com')->send(new OrderShipped($user_data, 'pirojok167@gmail.com'));
		$result_2 = \Mail::to($user_data['email'])->send(new OrderShipped($user_data, 'pirojok167@gmail.com'));

		if ($result_1 && $result_2)	return true;
		return false;
    }
}
