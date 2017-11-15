<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$services = Service::all();
	    return view('admin.services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $data = Service::validate($request);
	    $request->flash();

	    $image = Image::saveImage($request,'services');
	    if (!empty($image['error']) || !empty($image['errors'])) {
		    return redirect()->back()->withErrors($image);
	    }
	    $data['image'] = $image;

        $service = new Service();
	    $result = $service->fill($data)->save() ? 'Услуга добавлена' : 'Ошибка';
	    return redirect()->route('admin.services.index')->with('result', $result);
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
        $service = Service::find($id);
        return view('admin.services.edit')->with('service', $service);
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
	    $service = Service::find($id);
	    $data = Service::validate($request);

	    $image = Image::saveImage($request, 'services');
	    if (!empty($image['error'])) {
		    return redirect()->back()->withErrors($image);
	    } elseif($request->hasFile('image')) {
		    Image::destroyImage($service->image);
		    $data['image'] = $image;
	    } else {
		    $data['image'] = $service->image;
	    }

	    if ($data['name'] !== $service->name
		    || $data['description'] !== $service->description
		    || $image !== $service->image) {
		    $result = $service->fill($data)->save() ? 'Услуга добавлена' : 'Ошибка';
	    } else {
	    	$result = 'Нет изменений';
	    }
	    return redirect()->route('admin.services.index')->with('result', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $service = Service::find($id);
	    Image::destroyImage($service->image);
	    $result = $service->delete() ? 'Запись удалена' : 'Ошибка';
	    return redirect()->route('admin.services.index')->with('result', $result);
    }
}
