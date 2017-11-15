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
				'email' => 'required|email'
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
		$this->validate($request, [
			'old_password' => 'required',
			'password' => 'required|min:6',
			'password_confirmation' => 'required|min:6',
		]);

		if (\Hash::check($profile->password, bcrypt($data['old_password']))) {
			return redirect()->route('admin.getProfile')->with('result', 'Вы ввели действующий пароль');
		}

		if ($data['password'] !== $data['password_confirmation']) {
			$result = 'Пароль для подтверждения и новый парль не совпадают';
			return redirect()->route('admin.getProfile')->with('result', $result);
		}

		$password = \Hash::make($data['password']);
		$profile->password = $password;
		$result = $profile->save() ? 'Пароль изменён' : 'Ошибка';

		return redirect()->route('admin.getProfile')->with('result', $result);
	}
}

