<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function __construct()
	{

	}

	public function making()
	{
		return view('making');
    }

	public function repair()
	{
		return view('repair');
    }
}
