<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
use Redirect;

class CountryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $countries = Country::search($request['search'])->orderBy('countries.id', 'desc')->paginate(5);
        $countries->appends(['search' => $request['search']]);
        return view("admin.countries.index")
                        ->with("countries", $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre del país.',
        ]);
        $name = $request['name'];
        $country = new Country();
        $country->name_es = $name;
        $country->name_en = $name;
        $country->save();
        return Redirect::route('admin.countries.index')->with('message', 'País creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $country = Country::find($id);
        return view('admin.countries.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre del país.',
        ]);
        $name = $request['name'];
        $country = Country::find($id);
        $country->name_es = $name;
        $country->name_en = $name;
        $country->save();
        return Redirect::route('admin.countries.index')->with('message', 'País actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Country::destroy($id);
        return Redirect::back()->with('message', 'El país fue borrado.');
    }

}
