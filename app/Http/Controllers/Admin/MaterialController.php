<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$materials = Material::select()->orderBy('id', 'desc')->get();
	    return view('admin.material.index')->with('materials', $materials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 'image');
        $request->flash();

        $this->validate($request, ['name' => 'string|max:255|required']);

        $image = Image::saveImage($request, 'materials');
	    if (!empty($image['error']) || !empty($image['errors'])) {
		    return redirect()->back()->withErrors($image);
	    }

        $material = new Material();
	    if ($image) {
		    $material->image = $image;
	    } else {
		    return redirect()->route('admin.materials.create')->with('result', 'Выберите изображение');
	    }
	    $result = $material->fill($data)->save() ? 'Материал добавлен' : 'Ошибка';
        return redirect()->route('admin.materials.index')->with('result', $result);
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
        $material = Material::find($id);
        return view('admin.material.edit')->with('material', $material);
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
	    $material = Material::find($id);
	    $data = $request->except('_token', 'image');
	    $request->flash();

	    $this->validate($request, ['name' => 'string|max:255|required']);

	    $image = Image::saveImage($request, 'materials');

	    if (!empty($image['error'])) {
		    return redirect()->back()->withErrors($image);
	    } elseif($request->hasFile('image')) {
		    Image::destroyImage($material->image);
		    $material->image = $image;
	    } else {
		    $material->image = $material->image;
	    }

	    $result = $material->fill($data)->save() ? 'Материал добавлен' : 'Ошибка';
	    return redirect()->route('admin.materials.index')->with('result', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
	    Image::destroyImage($material->image);
	    $result = Material::destroy($id) ? 'Материал удалён' : $result = 'Ошибка';
        return redirect()->back()->with('result', $result);
    }
}
