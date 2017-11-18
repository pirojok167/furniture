<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
	protected $fillable = ['title', 'text', 'image'];
	protected $table = 'home';

	public $timestamps = false;
}
