<?php

namespace App\Http\Controllers;

use App\Image;
use App\Making;
use App\Repair;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function __construct()
	{

	}

	public function making(Making $making)
	{
		$makings = $making->orderBy('id', 'desc')->select()->paginate(config('settings.makings_paginate'));
		foreach ($makings as $making) {
			$making->image = Image::getImage($making->id);
		}

		$paginate = view('partials.paginate')->with('items', $makings)->render();

		return view('making')->with(['makings' => $makings, 'paginate' => $paginate, 'contacts' => $this->contacts]);
    }

	public function repair(Repair $repair)
	{
		$repairs = $repair->orderBy('id', 'desc')->select()->paginate(config('settings.repairs_paginate'));
		$paginate = view('partials.paginate')->with('items', $repairs)->render();
		return view('repair')->with(['repairs' => $repairs, 'paginate' => $paginate, 'contacts' => $this->contacts]);
    }
}
