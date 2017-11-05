<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $fillable = ['name', 'image', 'description'];

    public static function validate($request)
    {
	    $data = $request->except('_token', 'image');

	    $validator = \Validator::make($data, [
		    'name' => 'string|max:255|required',
		    'description' => 'string|max:360|required',
	    ]);

	    if ($validator->fails()) {
		    return redirect()->back()->withErrors($validator->errors());
	    }
		return $data;
    }


}
