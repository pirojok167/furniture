<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Repair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Repair $repair)
    {
    	$repairs = $repair->orderBy('id', 'desc')->select()->paginate(config('settings.repairs_paginate'));
	    $paginate = view('partials.paginate')->with('items', $repairs)->render();
	    return view('admin.repair.index')->with(['repairs' => $repairs, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.repair.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    if($request->hasFile('image_1') && $request->hasFile('image_2')) {
		    $image_1 = $request->file('image_1');
		    $image_2 = $request->file('image_2');
	    } else {
	    	return redirect()->back()->with('result', 'Необходимо выбрать 2 изображения: ДО и ПОСЛЕ');
	    }
	    $repair = new Repair();
	    $image_1 = $this->addImage($request, $image_1);
	    $image_2 = $this->addImage($request, $image_2);

	    if ($image_1 && $image_2) {
		    $repair->image_1 = $image_1;
		    $repair->image_2 = $image_2;
	    } else {
	    	return redirect()->back()->with('result', 'Можно добавлять только изображения в формате jpeg, png, gif');
	    }

	    $result = $repair->save() ? 'Изображения добавлены' : 'Ошибка';

        return redirect()->route('admin.repair.index')->with('result', $result);
    }

	public function addImage($request, $image)
	{
		$validator = \Validator::make($request->all(), [
			'image_1' => 'image',
			'image_2' => 'image',
		]);

		if ($validator->fails()) return false;
		$image = \Storage::disk('images')->put('repairs', $image);
		return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    	$repair = Repair::find($id);

    	if ($request->hasFile('image_1')) {
    		Image::destroyImage($repair->image_1);
		    $image = Image::saveImage($request, 'repairs');
		    $repair->image_1 = $image;
	    } elseif ($request->hasFile('image_2')) {
		    Image::destroyImage($repair->image_2);
		    $image = Image::saveImage($request, 'repairs');
		    $repair->image_2 = $image;
	    }

	    $result = $repair->save() ? "Изображение обновлено" : "Ошибка";
    	return redirect()->back()->with('result', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $repair = Repair::find($id);
	    if ($repair) {
		    Image::destroyImage($repair->image_1);
		    Image::destroyImage($repair->image_2);
		    $result = $repair->delete() ? 'Работа удалена' : 'Ошибка';
	    }
	    $result = 'Запись уже далена';
	    return redirect()->route('admin.repair.index')->with('result', $result);
    }
}
