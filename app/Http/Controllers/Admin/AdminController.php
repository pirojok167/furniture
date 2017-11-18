<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{

    }

	public function index()
	{
		$home_info = Home::first();
		return view('admin.home.index')->with('home_info', $home_info);
    }

	public function edit()
	{
		$home_info = Home::first();
		return view('admin.home.edit')->with('home_info', $home_info);
	}

	public function update(Request $request)
	{
		$data = $request->except('_token', 'image');
		$request->flash();

		$this->validate($request, [
			'title' => 'required|string|max:255',
			'text' => 'required|string|max:600'
		]);

		$home = Home::first();
		$image = Image::saveImage($request, 'templates');

		if (!empty($image['error'])) {
			return redirect()->back()->withErrors($image);
		} elseif($request->hasFile('image')) {
			Image::destroyImage($home->image);
			$home->image = $image;
		} else {
			$home->image = $home->image;
		}

		if ($data['title'] !== $home->title)
			$home->title = $data['title'];
		if ($data['text'] !== $home->text)
			$home->text = $data['text'];

		$result = $home->save() ? 'Изменения сохранены' : 'Ошибка';

		return redirect()->route('admin.admin')->with('result', $result);
	}

	public function editImage($image)
	{

	}


}
