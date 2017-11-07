<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index()
    {
    	$contacts = Contact::first();
        return view('admin.contacts')->with('contacts', $contacts);
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $contacts = Contact::first();
        if ($contacts == null) {
	        $contacts = new Contact();
        }
		$data = $request->except('_token');

        $this->validate($request, [
        	'phone_1' => 'string|max:255|required',
        	'phone_2' => 'string|max:255|',
	        'email' => 'email|required',
        ]);

		if ($data['phone_1'] !== $contacts->phone_1)
			$contacts->phone_1 = $data['phone_1'];
		if ($data['phone_2'] !== $contacts->phone_2)
			$contacts->phone_2 = $data['phone_2'];
		if ($data['email'] !== $contacts->email)
			$contacts->email = $data['email'];

	    $result = $contacts->save() ? 'Изменения сохранены' : 'Изменений не было';
	    return redirect()->route('admin.contacts.index')->with('result', $result);
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
}
