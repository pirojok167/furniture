<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 01.11.2017
 * Time: 18:00
 */

namespace App\Http\Controllers;


use App\User;

class IndexController extends Controller
{
	public $materials;
	public $services;
	public $contacts;

	public function __construct()
	{

	}

	public function index()
	{
		return view('home');
	}
}