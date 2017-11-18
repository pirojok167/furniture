<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 01.11.2017
 * Time: 18:00
 */

namespace App\Http\Controllers;

use App\Contact;
use App\Home;
use App\Material;
use App\Order;
use App\Service;

class IndexController extends Controller
{

	public function __construct()
	{
		$this->services = Service::select()->orderBy('id', 'desc')->get();
		$this->contacts = Contact::first();
		$this->materials = Material::select()->orderBy('id', 'desc')->get();
	}

	public function index()
	{
		$materials = $this->materials->chunk(4);
		$home_info = Home::first();

		return view('home')->with([
			'services' => $this->services,
			'contacts' => $this->contacts,
			'materials_chunk' => $materials,
			'home_info' => $home_info,
		]);
	}
}