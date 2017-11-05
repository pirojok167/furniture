<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index()
	{
		$profile = User::select('email')->first();
		return view('admin.profile')->with('profile', $profile);
	}

	public function changeProfile(Request $request)
	{
		$profile = User::first();
		$email = $request->input('email');

		if ($email !== $profile->email) {
			$this->validate($request, [
				'email' => 'email'
			]);

			$profile->email = $email;
			$result = $profile->save() ? 'Email изменён' : 'Ошибка';
		} else $result = 'Вы ввели действующий Email';

		return redirect()->route('admin.getProfile')->with('result', $result);
	}

	public function changePassword(Request $request)
	{
		$profile = User::first();
		$data = $request->except('_token');
		if (!\Hash::check($profile->password, bcrypt($data['new_password']))) {
			if (\Hash::check($profile->password, bcrypt($data['old_password']))
				|| $data['old_password'] !== $data['confirm_password']) {
				$password = \Hash::make($data['new_password']);
				$profile->password = $password;
				$result = $profile->save() ? 'Пароль изменён' : 'Ошибка';
			} else $result = 'Пароли не совпадают';
		} else $result = 'Вы ввели действующий пароль';

		return redirect()->route('admin.getProfile')->with('result', $result);
	}
}

