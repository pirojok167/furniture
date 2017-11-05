<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['phone_1', 'phone_2', 'email'];

	public $timestamps = false;
}
