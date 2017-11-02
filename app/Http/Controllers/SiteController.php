<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 01.11.2017
 * Time: 18:00
 */

namespace App\Http\Controllers;


class SiteController
{
	public $view = false;

	public function __construct()
	{
		$this->view = view('lulcum')->render();
	}

	public function index()
	{
		return $this->view;
	}
}