<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Province;
use Redirect;

class ProvinceController extends Controller {

    public function index(Request $request) {
        $provinces = Province::search($request['search'])->orderBy('provinces.id', 'desc')->paginate(5);
        $provinces->appends(['search' => $request['search']]);
        return view("admin.provinces.index")
                        ->with("provinces", $provinces);
    }

    public function create() {
        return view('admin.provinces.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre de la ciudad.',
        ]);
        $name = $request['name'];
        $province = new Province();
        $province->name = $name;
        $province->save();
        return Redirect::route('admin.provinces.index')->with('message', 'Ciudad creada correctamente.');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $province = Province::find($id);
        return view('admin.provinces.edit', ['province' => $province]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre de la ciudad.',
        ]);
        $name = $request['name'];
        $province = Province::find($id);
        $province->name = $name;
        $province->save();
        return Redirect::route('admin.provinces.index')->with('message', 'Ciudad actualizada correctamente.');
    }

    public function destroy($id) {
        //
    }

}
