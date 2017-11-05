<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Making;
use App\Repair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Making $making)
    {
	    $makings = $making->orderBy('id', 'desc')->select()->paginate(config('settings.makings_paginate'));
	    foreach ($makings as $making) {
		    $making->image = Image::getImage($making->id);
	    }
	    $paginate = view('partials.paginate')->with('items', $makings)->render();
	    return view('admin.making.index')->with(['makings' => $makings, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.making.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$data = $request->except('_token');

    	$this->validate($request, [
    		'name' => 'string|max:255|required'
	    ]);

	    $making = new Making();
	    $result = $making->fill($data)->save();

	    if ($result) {
		    $result = Image::saveImages($request, 'makings', $making->id) ? 'Изделие добавлено' : 'Ошибка';
	    }

        return redirect()->route('admin.making.index')->with('result', $result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $making = Making::find($id);
	    $making->images = Image::getImages($id);
        return view('admin.making.edit')->with('making', $making);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $data = $request->except('_token');

	    $this->validate($request, [
		    'name' => 'string|max:255|required'
	    ]);

	    $making = Making::find($id);
	    $result = $making->fill($data)->save();

	    if ($result) {
		    $result = Image::saveImages($request, 'makings', $making->id) ? 'Изменения сохранены' : 'Ошибка';
	    }

	    return redirect()->route('admin.making.index')->with('result', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	public function makingDeletImage(Request $request)
	{
		$result = Image::destroyImage($request->input('image')) ? 'Изображение удалено' : 'Ошибка';
		return redirect()->back()->with('result', $result);
    }
}
